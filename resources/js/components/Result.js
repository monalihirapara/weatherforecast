import React, { Fragment } from 'react';
import PropTypes from 'prop-types';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import {
  faCloud,
  faBolt,
  faCloudRain,
  faCloudShowersHeavy,
  faSnowflake,
  faSun,
  faSmog,
} from '@fortawesome/free-solid-svg-icons';

import ForecastHour from './ForecastHour';

const Result = ({ weather }) => {
  const {
    city,
    country,
    date,
    description,
    main,
    temp,
    sunset,
    sunrise,
    humidity,
    wind,
    highestTemp,
    lowestTemp,
    forecast,
  } = weather;

  let weatherIcon = null;

  if (main === 'Thunderstorm') {
    weatherIcon = <FontAwesomeIcon icon={faBolt} />;
  } else if (main === 'Drizzle') {
    weatherIcon = <FontAwesomeIcon icon={faCloudRain} />;
  } else if (main === 'Rain') {
    weatherIcon = <FontAwesomeIcon icon={faCloudShowersHeavy} />;
  } else if (main === 'Snow') {
    weatherIcon = <FontAwesomeIcon icon={faSnowflake} />;
  } else if (main === 'Clear') {
    weatherIcon = <FontAwesomeIcon icon={faSun} />;
  } else if (main === 'Clouds') {
    weatherIcon = <FontAwesomeIcon icon={faCloud} />;
  } else {
    weatherIcon = <FontAwesomeIcon icon={faSmog} />;
  }

  return (
    <Fragment>
      <div>
        <p className="text-base sm:text-lg md:text-xl lg:text-2xl xl:text-3xl font-bold text-white p-2">{city}, {country}</p>
      </div>
      <div className="text-2xl text-white">{date}</div>
      <div className="grid grid-cols-2 gap-4">
        <div>
          <div className="grid grid-cols-2 gap-4">
            <div className="flex justify-end text-7xl text-white"> {weatherIcon}</div>
            <div>
              <div className="text-4xl text-white">{Math.floor(temp)}&#176;</div>
              <div className="text-4xl text-white">{description}</div>
            </div>
          </div>
        </div>
        <div>
          <div className="grid grid-cols-3 gap-4 mb-6">
            <div className="py-5 px-3 bg-gray-100 bg-opacity-25 text-center text-2xl text-white"><h4 className="mb-1">{Math.floor(highestTemp)}&#176;</h4><span>Hight</span></div>
            <div className="py-5 px-3 bg-gray-100 bg-opacity-25 text-center text-2xl text-white"><h4 className="mb-1">{wind}mph</h4><span>Wind</span></div>
            <div className="py-5 px-3 bg-gray-100 bg-opacity-25 text-center text-2xl text-white"><h4 className="mb-1">{sunrise}</h4><span>Sunrise</span></div>
            <div className="py-5 px-3 bg-gray-100 bg-opacity-25 text-center text-2xl text-white"><h4 className="mb-1">{Math.floor(lowestTemp)}&#176;</h4><span>Low</span></div>
            <div className="py-5 px-3 bg-gray-100 bg-opacity-25 text-center text-2xl text-white"><h4 className="mb-1">{humidity}%</h4><span>Rain</span></div>
            <div className="py-5 px-3 bg-gray-100 bg-opacity-25 text-center text-2xl text-white"><h4 className="mb-1">{sunset}</h4><span>Sunset</span></div>

          </div>
        </div>
      </div>
      <div>
        {forecast && <ForecastHour forecast={forecast} />}
      </div>
    </Fragment>
  );
};

Result.propTypes = {
  weather: PropTypes.shape({
    city: PropTypes.string,
    country: PropTypes.string,
    date: PropTypes.string,
    description: PropTypes.string,
    main: PropTypes.string,
    temp: PropTypes.number,
    sunrise: PropTypes.string,
    sunset: PropTypes.string,
    humidity: PropTypes.number,
    wind: PropTypes.number,
    highestTemp: PropTypes.number,
    lowestTemp: PropTypes.number,
    forecast: PropTypes.array,
  }).isRequired,
};

export default Result;
