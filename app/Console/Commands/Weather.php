<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Helper\TableCell;

class Weather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather {city=Brisbane}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Displaying weather forecast from city name';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $APIkey = "c6f5267ac4eab38fe1709b9d7b862ab5";
        $city = $this->ask("Enter City Name (Use comma for multiple City Weather Forecast)");
        $cityString = explode(",",$city);
        foreach($cityString as $key=>$cityname){
          $APIURL = "https://api.openweathermap.org/data/2.5/forecast?q=${cityname}&APPID=${APIkey}&units=metric";

           try {
                $client = new Client();
                $response = $client->request('GET', $APIURL);
                $statusCode = $response->getStatusCode();
                $forcastOutput = $response->getBody();
                $forcastOutput_decod = json_decode($forcastOutput,TRUE);
                $cityName = $forcastOutput_decod['city']['name'];
                $this->comment($cityName);
            
                $table = new Table($this->output);
                $table->setHeaders([
                    'Date','Temp','Mini Temp','Max Temp'
                ]);
                $separator = new TableSeparator;
                
                $filterData = (object)[];
                foreach ($forcastOutput_decod['list'] as $val )
                {
                    $currentDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $val['dt_txt'])
                    ->format('d-m-Y');
                    if(property_exists($filterData , $currentDate)){
                    array_push($filterData -> $currentDate, (array)$val);
                    }else{
                    $filterData -> $currentDate = [$val];
                    }
                }

                foreach ($filterData as $itemdata){
                    $forecastDt = $itemdata[0]['dt_txt'];
                    $this->info($forecastDt);
                    
                    foreach($itemdata as $forecaseitem){
                        $table->setRows([
                            [
                                $forecaseitem['dt_txt'],
                                $forecaseitem['main']['temp'],
                                $forecaseitem['main']['temp_min'],
                                $forecaseitem['main']['temp_max']
                            ],
                            $separator,
                            ]);
                            $table->render();
                    }
                }
		    } catch (\Exception $e) {
            $this->error("Sorry No data found for this city");
		}
      }
       
    }
}