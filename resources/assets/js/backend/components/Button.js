import React from "react";
import {Button} from "react-bootstrap";

export const PrimaryButton = ({onClick, children, ...rest}) => {
  return (
    <Button bsStyle="primary" {...rest}>
      {children}
    </Button>
  );
};

export const SuccessButton = ({onClick, children, ...rest}) => {
  return (
    <Button bsStyle="success" {...rest}>
      {children}
    </Button>
  );
};

export const InfoButton = ({children, ...rest}) => {
  return (
    <Button bsStyle="info" {...rest}>
      {children}
    </Button>
  );
};

export const WarningButton = ({children, ...rest}) => {
  return (
    <Button bsStyle="warning" {...rest}>
      {children}
    </Button>
  );
};

export const DangerButton = ({children, ...rest}) => {
  return (
    <Button bsStyle="danger" {...rest}>
      {children}
    </Button>
  );
};

export const LinkButton = ({submit, children, ...rest}) => {
  return (
    <Button bsStyle="link" type={submit ? 'submit' : 'button'} {...rest}>
      {children}
    </Button>
  );
};

export const UnauthorizedButton = ({onClick, ...rest}) => {
  return (
    <Button onClick={onClick} disabled {...rest}>
      Unauthorized
    </Button>
  );
};