import React from 'react';
import PropTypes from 'prop-types';


export class RSVPTimer extends React.Component
{
	constructor(props)
	{
		super(props);
		this.state = {
			'event': new Date(weddingDate.date), 
			'now' : new Date(),
			'seconds': '',
			'minutes' : '',
			'hours': '',
			'days': '',
		}
	}

	tick()
	{
		let now = new Date();
		var event = this.state.event;
		let diff = Math.abs(now.getTime() - event.getTime());

		let days = Math.floor(diff / (1000 * 60 * 60 * 24));
		diff -= days * 1000 * 60 * 60 * 24;

		let hours = Math.floor(diff / (1000 * 60 * 60)); 
		diff	-= hours * 1000 * 60 * 60;

		let minutes = Math.floor(diff / (1000 * 60)); 
		diff	-= minutes * 1000 * 60;

		let seconds = Math.floor(diff / 1000); 

		this.setState({
			seconds, minutes, hours, days, now
		});
	}

	componentDidMount()
	{
		this.timerID = setInterval(
      () => this.tick(),
      1000
    );
	}
	componentWillUnmount() {
		clearInterval(this.timerID);
	}
	
	render()
	{
		return (
			<div>
				<span className="days box-theme">
					{this.state.days} <br />
					Days
				</span>
				<span className="hours box-theme">
					{this.state.hours} <br />
					Hours
				</span>
				<span className="minutes box-theme">
					{this.state.minutes} <br />
					Min
				</span>
				<span className="seconds box-theme">
					{this.state.seconds} <br />
					Sec
				</span>
			</div>
		);
	}
}