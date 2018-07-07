import React from "react";
import {Button} from "react-bootstrap";

export const PrimaryButton = ({children, ...rest}) => {
  return (
    <Button bsStyle="primary" {...rest}>
      {children}
    </Button>
  );
};

export const SuccessButton = ({children, ...rest}) => {
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

export const LinkButton = ({children, ...rest}) => {
  return (
    <Button bsStyle="link" {...rest}>
      {children}
    </Button>
  );
};

export const UnauthorizedButton = ({...rest}) => {
  return (
    <Button disabled {...rest}>
      Unauthorized
    </Button>
  );
};