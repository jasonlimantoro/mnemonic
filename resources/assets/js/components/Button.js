import React from "react";
import { Button } from "react-bootstrap";

export const PrimaryButton = (props) => {
    return (
        <Button type={props.type} bsStyle="primary" onClick={props.onClick}>{props.text} </Button>
    )
}

export const SuccessButton = (props) => {
    return (
        <Button type={props.type} bsStyle="success" onClick={props.onClick}>{props.text} </Button>
    )
}