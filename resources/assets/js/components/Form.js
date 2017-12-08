import React from "react";
import { FormGroup, FormControl, ControlLabel } from "react-bootstrap";

function FieldGroup ( {id, label, ...props}) {
    return (
        <FormGroup controlId={id}>
            <ControlLabel>{label}</ControlLabel>
            <FormControl {...props} />
        </FormGroup>
    )
}

export const Form = (props) => {
    return (
        <form action="">
            <FieldGroup 
                id = "formControlsTitle"
                type = "text"
                label = "Title"
                placeholder = "Enter title"
            />

            <FormGroup controlId="formControlsTextarea">
                <ControlLabel>Body</ControlLabel>
                <FormControl componentClass="textarea" placeholder="Enter Body" />
            </FormGroup>
        
        </form>
    )
}
