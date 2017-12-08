import React from "react";
import { Button } from "react-bootstrap";

export const PrimaryButton = (props) => {
    return (
        <Button bsStyle="primary" onClick={props.onClick}>{props.text} </Button>
    )
}

export const SuccessButton = (props) => {
    return (
        <Button bsStyle="success" onClick={props.onClick}>{props.text} </Button>
    )
}