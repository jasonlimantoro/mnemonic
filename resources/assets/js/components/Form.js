import React from "react";
import { FormGroup, FormControl, ControlLabel } from "react-bootstrap";
import { PrimaryButton, SuccessButton } from "./Button";

function FieldGroup ( {id, label, ...props}) {
    return (
        <FormGroup controlId={id}>
            <ControlLabel>{label}</ControlLabel>
            <FormControl {...props} />
        </FormGroup>
    )
}

export const FormPost = (props) => {
    return (
        <form method="POST" action={props.action}>
            <FieldGroup
                id = "formControlsTitle"
                type = "text"
                label = "Title"
                placeholder = "Enter title"
                name = "title"
                value = {props.titleValue}
            />

            <FormGroup controlId="formControlsTextarea">
                <ControlLabel>Body</ControlLabel>
                <FormControl 
                    componentClass="textarea" 
                    placeholder="Enter Body" 
                    name="body"
                    cols="30"
                    rows="10"
                /> {props.bodyValue}
            </FormGroup>

            <PrimaryButton type="submit" text="Publish" />
        </form>
    )
}
