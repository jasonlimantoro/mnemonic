import React from "react";
import { Button } from "react-bootstrap";
import { confirmAction } from "../functionals/helper";

export const PrimaryButton = ({ children, ...rest }) => {
  return (
    <Button bsStyle="primary" {...rest}>
      {children}
    </Button>
  );
};

export const SuccessButton = ({ children, ...rest }) => {
  return (
    <Button bsStyle="success" {...rest}>
      {children}
    </Button>
  );
};

export const InfoButton = ({ children, ...rest }) => {
  return (
    <Button bsStyle="info" {...rest}>
      {children}
    </Button>
  );
};

export const WarningButton = ({ children, ...rest }) => {
  return (
    <Button bsStyle="warning" {...rest}>
      {children}
    </Button>
  );
};

export const DangerButton = ({ children, ...rest }) => {
  return (
    <Button bsStyle="danger" {...rest}>
      {children}
    </Button>
  );
};

export const LinkButton = ({ children, ...rest }) => {
  return (
    <Button bsStyle="link" {...rest}>
      {children}
    </Button>
  );
};

export const UnauthorizedButton = ({ ...rest }) => {
  return (
    <Button disabled {...rest}>
      Unauthorized
    </Button>
  );
};

export const DeleteButton = ({ url, text, hasImage, ...rest }) => {
  return (
    <form action={url} method="POST" onSubmit={(e) => confirmAction(e)}>
      <input type="hidden" name="_method" value="DELETE"/>
      <DangerButton type="submit" {...rest} disabled={hasImage === '0'}>
        {text}
      </DangerButton>
    </form>
  )
};