import React, { Component, Fragment } from 'react';
import ReactDOM from 'react-dom';
import Result from './Result';
import * as _ from 'lodash';
import moment from 'moment';
const Google_API_KEY = "AIzaSyAoVNXZbT2DsVsAdwXdFdjgvoByqYcwmPU";
const APIkey = "c6f5267ac4eab38fe1709b9d7b862ab5";


class Weather extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: "",
      weatherInfo: null,
      error: false,
      place: null,
      timeout: 0,
      weatherData: null
    };
  }

  searchWeatherAPI = (event) => {
    var searchText = event.target.value; // this is the search text

    if (this.state.timeout) clearTimeout(this.state.timeout);
    this.setState({
      timeout: setTimeout(() => {
        if (searchText.trim().length && searchText.trim().length > 2) {
          this.getWeatherData(searchText);
        }
      }, 700)
    });
  };

  getWeatherData = (text) => {
    const weather = `https://api.openweathermap.org/data/2.5/weather?q=${text}&APPID=${APIkey}&units=metric`;
    const forecast = `https://api.openweathermap.org/data/2.5/forecast?q=${text}&APPID=${APIkey}&units=metric`;
    Promise.all([fetch(weather), fetch(forecast)])
      .then(([res1, res2]) => {
        if (res1.ok && res2.ok) {
          return Promise.all([res1.json(), res2.json()]);
        }
        throw Error(res1.statusText, res2.statusText);
      })
      .then(([data1, data2]) => {
        const months = [
          'January',
          'February',
          'March',
          'April',
          'May',
          'June',
          'July',
          'August',
          'September',
          'October',
          'Nocvember',
          'December',
        ];
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const currentDateToday = new Date();
        const date = `${days[currentDateToday.getDay()]} ${currentDateToday.getDate()} ${
          months[currentDateToday.getMonth()]
          }`;
        const sunset = new Date(data1.sys.sunset * 1000).toLocaleTimeString().slice(0, 5);
        const sunrise = new Date(data1.sys.sunrise * 1000).toLocaleTimeString().slice(0, 5);

        let filterData = {};
        console.log(data2.list);
        _.forEach(data2.list, function (value) {
          console.log(value);
          let currentDate = moment(value.dt_txt).format('DD-MM-YYYY');

          if (filterData.hasOwnProperty(currentDate)) {
            filterData[currentDate].push(value);
            console.log("if", filterData);
          } else {
            console.log("else", filterData);
            filterData[currentDate] = [value];
          }
        });

        let currentDate = new Date(), finalResult = [];
        for (let i = 0; i < 5; i++) {
          let currentDateFormat = moment(currentDate).add(i, 'day').format('DD-MM-YYYY');
          finalResult.push(filterData[currentDateFormat]);

        };

        const weatherData = {
          city: data1.name,
          country: data1.sys.country,
          date,
          description: data1.weather[0].description,
          main: data1.weather[0].main,
          temp: data1.main.temp,
          highestTemp: data1.main.temp_max,
          lowestTemp: data1.main.temp_min,
          sunrise,
          sunset,
          clouds: data1.clouds.all,
          humidity: data1.main.humidity,
          wind: data1.wind.speed,
          forecast: finalResult,
        };
        this.setState({
          error: false,
          weatherData: weatherData
        });
      })
      .catch(error => {
        console.log(error);

        this.setState({
          error: true,
          weatherData: null,
        });
      });
  };

  render() {
    const { value, weatherData, error } = this.state;
    return (
      <Fragment>
        <div>
          <div className="searchFrom">

            <div className="flex justify-center mt-5">
              <div className="w-full sm:w-5/6 md:w-2/3 xl:max-w-5xl">
                <div className="h-12 mx-5 mt-5">
                  <div className="relative">
                    <div className="absolute top-0 left-0 ml-5 mt-3">
                      <p className="opacity-75 text-2xl fill-dark">
                        <svg strokeWidth="currentColor" fill="none" strokeLinecap="2" viewBox="0 0 24 24" strokeLinecap="round" strokeLinejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                      </p>
                    </div>
                    <input onKeyUp={this.searchWeatherAPI} className="tracking-tighter bg-gray-300 data-hj-whitelist block appearance-none w-full border-none rounded-full shadow py-3 pl-12 pr-6 mb-3 leading-tight focus:outline-none focus:bg-gray-200 truncate text-dark" id="grid-first-name" type="text" placeholder="Type city name to find weather forecast" />
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div className="result">
            {weatherData && <Result weather={weatherData} />}
            {error && <span className="flex justify-center mt-10 text-center text-3xl text-white">Sorry, the specified city was not found..</span>}
          </div>
        </div>
      </Fragment>
    );
  }
}

export default Weather;

if (document.getElementById('weather')) {
  ReactDOM.render(<Weather />, document.getElementById('weather'));
}
