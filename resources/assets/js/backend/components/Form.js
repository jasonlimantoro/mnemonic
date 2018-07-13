import React from "react";
import PropTypes from "prop-types";
import {FormGroup, FormControl, ControlLabel, Radio} from "react-bootstrap";

function FieldGroup({id, label, labelClass, ...props}) {
  return (
    <FormGroup controlId={id}>
      <ControlLabel className={labelClass}>{label}</ControlLabel>
      <FormControl {...props} />
    </FormGroup>
  )
}

export class SearchBox extends React.Component {
  constructor(props) {
    super(props);
    this.handleChange = this.handleChange.bind(this)
  }

  handleChange(e) {
    const value = e.target.value;
    this.props.onChange(value);
  }

  render() {
    return (
      <div>
        <FieldGroup
          id="formControlsSearch"
          type="text"
          placeholder={this.props.placeholder}
          name="search"
          onChange={this.handleChange}
          value={this.props.value}
        />
      </div>
    )
  }
}

export class RadioButton extends React.Component {
  constructor(props) {
    super(props);
    this.handleChange = this.handleChange.bind(this)
  }

  handleChange(e) {
    const value = e.target.value;
    this.props.onChange(value);
  }

  render() {
    return (
      <div>
        Search Parameters:
        <FormGroup>
          <Radio
            name="radioGroup"
            inline
            value="title"
            defaultChecked
            onChange={this.handleChange}
          >
            Title
          </Radio>
          {' '}
          <Radio
            name="radioGroup"
            inline
            value="body"
            checked={this.props.selectedOption === 'body'}
            onChange={this.handleChange}
          >
            Body
          </Radio>
        </FormGroup>
      </div>
    )
  }
}

export class InputFile extends React.Component {
  constructor(props) {
    super(props);
    this.handleChange = this.handleChange.bind(this);
  }

  handleChange(e) {
    e.preventDefault();
    let file = e.target.files[0];
    if(file) {
      let reader = new FileReader();

      reader.onloadend = () => {
        this.props.onChange(file, reader.result);
      };
      reader.readAsDataURL(file);
    }
  }

  render() {
    const { label, labelClass, name } = this.props;
    return (
      <FieldGroup
        id="inputFile"
        type="file"
        label={label}
        labelClass={labelClass}
        name={name}
        style={{'opacity': 0, 'display': 'inline'}}
        onChange={this.handleChange}
      />
    );
  }
}

InputFile.propTypes = {
  label: PropTypes.string.isRequired,
  labelClass: PropTypes.string,
  name: PropTypes.string.isRequired,
  onChange: PropTypes.func
}

export const TextArea = (props) => {
  return (
    <div>
      <FieldGroup
        componentClass="textarea"
        name={props.name}
        label={props.label}
        placeholder={props.placeholder}
        rows="10"
        cols="30"
      />
    </div>
  )
}

export const SelectForm = (props) => {
  return (
    <FormGroup controlId="formControlSelect">
      <ControlLabel>{props.label}</ControlLabel>
      <FormControl componentClass="select" name={props.name}>
        {props.children}
      </FormControl>
    </FormGroup>
  );
}
