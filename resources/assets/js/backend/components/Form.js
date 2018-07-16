import React from "react";
import PropTypes from "prop-types";
import { FormGroup, FormControl, ControlLabel } from "react-bootstrap";

const FieldGroup = ({ id, label, labelClass, ...props }) => {
  return (
    <FormGroup controlId={id}>
      <ControlLabel className={labelClass}>{label}</ControlLabel>
      <FormControl {...props} />
    </FormGroup>
  )
};


export const InputFile = ({ onChange, ...rest }) => {

  const handleChange = (e) => {
    e.preventDefault();
    let file = e.target.files[0];
    if (file) {
      let reader = new FileReader();

      reader.onloadend = () => {
        onChange(file, reader.result);
      };
      reader.readAsDataURL(file);
    }
  };
  return (
    <FieldGroup
      id="inputFile"
      type="file"
      style={{ 'opacity': 0, 'display': 'inline' }}
      onChange={handleChange}
      {...rest}
    />
  );
};

InputFile.propTypes = {
  label: PropTypes.string.isRequired,
  labelClass: PropTypes.string,
  name: PropTypes.string.isRequired,
  onChange: PropTypes.func
};
