import React from "react";
import { FormGroup, FormControl, ControlLabel } from "react-bootstrap";
import { PrimaryButton } from "./Button";

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
        <form method="POST" action="/posts">
            <FieldGroup
                id = "formControlsTitle"
                type = "text"
                label = "Title"
                placeholder = "Enter title"
                name = "title"
            />

            <FormGroup controlId="formControlsTextarea">
                <ControlLabel>Body</ControlLabel>
                <FormControl componentClass="textarea" placeholder="Enter Body" name="body" />
            </FormGroup>

            <PrimaryButton type="submit" text="Publish" />
        </form>
    )
}
