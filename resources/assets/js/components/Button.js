import React from "react";
import { Button } from "react-bootstrap";

export const PrimaryButton = (props) => {
    return (
        <Button type={props.type} bsStyle="primary" onClick={props.onClick}>
            {props.text} 
        </Button>
    )
}

export const SuccessButton = (props) => {
    return (
        <div>
            <Button type={props.type} bsStyle="success" onClick={props.onClick}>
                {props.text}
            </Button>
        </div>
    )
}

export const InfoButton = (props) => {
    return (
        <Button type={props.type} bsStyle="info" onClick={props.onClick}>
            {props.text} 
        </Button>
    )
}

export const WarningButton = (props) => {
    return (
        <Button type={props.type} bsStyle="warning" onClick={props.onClick}>
            {props.text} 
        </Button>
    )
}

export const DangerButton = (props) => {
    return (
        <Button type={props.type} bsStyle="danger" onClick={props.onClick}>
            {props.text} 
        </Button>
    )
}