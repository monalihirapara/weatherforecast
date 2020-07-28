import React, { Fragment } from 'react';
import PropTypes from 'prop-types';
import moment from 'moment';

class ForecastHour extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      iconURL: "https://openweathermap.org/img/w/",
      forcastHour: null,
      loadingState: true
    };
  }
  componentDidMount() {
    this.getCurrentDateWeather(0);
  }

  getCurrentDateWeather = (index = 0) => {
    console.log("Now getting data of day: ", index);
    console.log(this.props.forecast[index]);
    this.setState({ forcastHour: this.props.forecast[index], loadingState: false });

  }
  render() {
    return (
      <Fragment>
        <div className="grid grid-cols-5 gap-4 mb-4">
          {this.props.forecast.map((item, index) => (
            <button key={index} onClick={() => this.getCurrentDateWeather(index)}><div key={index} className="py-5 px-3 bg-gray-100 bg-opacity-25 text-center text-2xl text-white active:bg-indigo-600 focus:bg-indigo-600">{moment(item[0].dt_txt).format("DD/MM/YYYY")}</div></button>
          ))}
        </div>

        {this.state.loadingState ? (
          <p>Loading</p>
        ) : this.state.forcastHour ? (
          <div className="grid grid-cols-5 gap-4">
            {this.state.forcastHour.map((itemHour, indexkey) => (
              <div key={itemHour.dt} className="py-5 px-3 bg-gray-100 bg-opacity-25 text-center text-2xl text-white">
                <h4 className="mb-1">{itemHour.dt_txt.slice(8, 10) + "/" + itemHour.dt_txt.slice(5, 7)}</h4>
                <h4>{itemHour.dt_txt.slice(11, 13) * 1}:00</h4>
                <span className="flex flex-col justify-start justify-center"><img className="sm:-mt-2 sm:-mb-1 mx-auto w-12 h-12 sm:w-16 sm:h-16 object-contain" src={this.state.iconURL + itemHour.weather[0].icon + `.png`} /></span>
                <span>{Math.floor(itemHour.main.temp * 1) / 1}&#176;</span>
              </div>
            ))}
          </div>) : null}
      </Fragment>
    );
  }
};

export default ForecastHour;
