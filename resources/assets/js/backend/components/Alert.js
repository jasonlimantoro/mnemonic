import React from "react";
import { Alert } from "react-bootstrap";


export const SuccessAlert = ({ children, ...rest }) => (
  <Alert bsStyle="success" {...rest}>
    {children}
  </Alert>
);

export const ErrorAlert = ({ children, ...rest }) => (
  <Alert bsStyle="danger" {...rest}>
    {children}
  </Alert>
);

