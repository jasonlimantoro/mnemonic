import React from "react";
import {Button} from "react-bootstrap";

export const PrimaryButton = ({ onClick, children, ...rest }) => {
  return (
    <Button bsStyle="primary" onClick={onClick} {...rest}>
      {children}
    </Button>
  );
};

export const SuccessButton = ({ onClick, children, ...rest}) => {
  return (
    <Button bsStyle="success" onClick={onClick} {...rest}>
      {children}
    </Button>
  );
};

export const InfoButton = ({ onClick, children, ...rest }) => {
  return (
    <Button bsStyle="info" onClick={onClick} {...rest}>
      {children}
    </Button>
  );
};

export const WarningButton = ({ onClick, children, ...rest }) => {
  return (
    <Button bsStyle="warning" onClick={onClick} {...rest}>
      {children}
    </Button>
  );
};

export const DangerButton = ({ onClick, children, ...rest }) => {
  return (
    <Button bsStyle="danger" onClick={onClick} {...rest}>
      {children}
    </Button>
  );
};

export const UnauthorizedButton = ({ onClick,...rest }) => {
  return (
    <Button onClick={onClick} disabled {...rest}>
      Unauthorized
    </Button>
  );
};