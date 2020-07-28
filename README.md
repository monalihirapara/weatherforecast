# weatherforecast
Weather Forecast application using Laravel,React,Tailwind CSS

Technoloy Used : Laravel 6 + React + Tailwind CSS

Weather API : https://openweathermap.org/api

---Instructions for installation---

1] Copy project folder in local enviroment.
2] Setup Database and Configure Database in .env file.
3] From CMD run the "npm install" command to install all the required npm pakages.
4] Run project in browser eg.localhostURL.test

---Execution of your solution---

Web Application :
1] Run project
2] Go to the URL http://myapp.test/weather
3] Type any city name in textbox to get weather forecast for next five days including today.
4] Click on listed date to view hourly base forecast for particular date.


Console application : 
1] Run project in CMD for eg. I am using Git base to run project in console.
2] Go to the root directory of project eg. vagrant@homestead:~/Projects_Laravel/myapp$
3] Run command "php artisan weather" and enter.
4] It will ask you to enter the city name.
5] Enter the city name to see the weather forecast.

---Brief summary of the assumptions and design decisions made---

1] Why I have used Openweathermap?
   Becuase it is free and allows maximum call request compare to other API.

2] Due to time limitation I haven't configure City's API to populate city Dropdown.

3] I have run the default Laravel unit test for this project and have not created new test class due to time limitation, so unable to provide the test solution.





