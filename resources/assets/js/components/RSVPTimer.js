import React from "react";
import styled from "styled-components";

const StyledSpan = styled.span`
	width: 150px;
  border: 2px solid white;
  border-radius: 15px;
  font-size: 25pt;
  padding: 0 15px;
  margin: 0 15px;
  display: inline-block;
`;


export class RSVPTimer extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      event: new Date(this.props.weddingDate.date),
      now: new Date(),
      seconds: "",
      minutes: "",
      hours: "",
      days: "",
    };
  }

  static diffInMilliSeconds(dt1, dt2) {
    return dt2.getTime() - dt1.getTime();
  }

  calculateDiffHumans() {
    let now = new Date();
    let { event } = this.state;
    let diff = Math.abs(RSVPTimer.diffInMilliSeconds(event, now));
    let seconds = Math.floor(diff / 1000);
    let minutes = Math.floor(seconds / 60);
    let hours = Math.floor(minutes / 60);
    let days = Math.floor(hours / 24);

    seconds %= 60;
    minutes %= 60;
    hours %= 24;
    days %= 365;

    return { days, hours, minutes, seconds, now };
  }

  tick() {
    const { seconds, minutes, hours, days, now } = this.calculateDiffHumans();

    this.setState({
      seconds,
      minutes,
      hours,
      days,
      now
    });
  }

  static isApple() {
    return navigator.userAgent.match(/(iPhone|iPod|iPad|Safari)/) !== null;
  }

  /**
   *
   * @param {string} date // yyyy-mm-dd hh:mm:ss...
   * @return {string} // mm/dd/yy hh:mm:ss
   */
  static convertDateForApple(date) {
    let dateParts = date.substring(0, 10).split("-");
    let timePart = date.substr(11, 5);
    return `${dateParts[1]}/${dateParts[2]}/${dateParts[0]} ${timePart}`;
  }

  componentWillMount() {
    if (RSVPTimer.isApple()) {
      let date = this.props.weddingDate;
      let dateString = RSVPTimer.convertDateForApple(date);
      let event = new Date(dateString);
      this.setState({ event });
    }
  }

  componentDidMount() {
    this.timerID = setInterval(() => this.tick(), 1000);
  }
  componentWillUnmount() {
    clearInterval(this.timerID);
  }

  render() {
    const { days, hours, minutes, seconds } = this.state;
    return (
      <div>
        <StyledSpan className={"box-theme"}>
          {days} <br />
          Days
        </StyledSpan>
        <StyledSpan className={"box-theme"}>
          {hours.toString().padStart(2, "0")} <br />
          Hours
        </StyledSpan>
        <StyledSpan className={"box-theme"}>
          {minutes.toString().padStart(2, "0")} <br />
          Min
        </StyledSpan>
        <StyledSpan className={"box-theme"}>
          {seconds.toString().padStart(2, "0")} <br />
          Sec
        </StyledSpan>
      </div>
    );
  }
}
