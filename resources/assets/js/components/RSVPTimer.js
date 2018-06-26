import React from "react";

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

  diffInMilliSeconds(dt1, dt2) {
    return dt2.getTime() - dt1.getTime();
  }

  calculateDiffHumans() {
    let now = new Date();
    let { event } = this.state;
    let diff = Math.abs(this.diffInMilliSeconds(event, now));

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
    // let diffHumans = this.calculateDiffHumans();
    // let seconds = diffHumans.seconds.toString().padStart(2, "0");
    // let minutes = diffHumans.minutes.toString().padStart(2, "0");
    // let hours = diffHumans.hours.toString().padStart(2, "0");
    // let days = diffHumans.days;
    // let now = diffHumans.now;

    this.setState({
      seconds,
      minutes,
      hours,
      days,
      now
    });
  }

  isApple() {
    return navigator.userAgent.match(/(iPhone|iPod|iPad|Safari)/) !== null;
  }

  /**
   *
   * @param {string} date // yyyy-mm-dd hh:mm:ss...
   * @return {string} // mm/dd/yy hh:mm:ss
   */
  convertDateForApple(date) {
    let dateParts = date.substring(0, 10).split("-");
    let timePart = date.substr(11, 5);
    let newDate =
      dateParts[1] + "/" + dateParts[2] + "/" + dateParts[0] + " " + timePart;
    return newDate;
  }

  componentWillMount() {
    if (this.isApple()) {
      let date = this.props.weddingDate;
      let dateString = this.convertDateForApple(date);
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
        <span className="days box-theme">
          {days} <br />
          Days
        </span>
        <span className="hours box-theme">
          {hours.toString().padStart(2, "0")} <br />
          Hours
        </span>
        <span className="minutes box-theme">
          {minutes.toString().padStart(2, "0")} <br />
          Min
        </span>
        <span className="seconds box-theme">
          {seconds.toString().padStart(2, "0")} <br />
          Sec
        </span>
      </div>
    );
  }
}
