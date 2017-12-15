import React from "react";
import { FormGroup, FormControl, ControlLabel, Radio } from "react-bootstrap";
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

export class SearchBox extends React.Component {
    constructor(props) {
        super(props);
        this.handleChange = this.handleChange.bind(this)
    }
    handleChange(e) {
        const value = e.target.value;
        this.props.onChange(value);
    }
    render () {
        return(
            <div>
                <FieldGroup
                    id = "formControlsSearch"
                    type = "text"
                    label = "Search"
                    placeholder = {this.props.placeholder}
                    name = "search"
                    onChange = {this.handleChange}
                    value = {this.props.value}
                />
            </div>
        )
    }
}

export class RadioButton extends React.Component {
    constructor(props) {
        super(props);
        this.handleChange = this.handleChange.bind(this)
    }
    handleChange(e) {
        const value = e.target.value;
        this.props.onChange(value);
    }

    render () {
        return(
            <div>
                <FormGroup>
                    <Radio 
                        name="radioGroup" 
                        inline
                        value = "title"
                        defaultChecked
                        onChange = {this.handleChange}
                    >
                        Title
                    </Radio>
                    {' '}
                    <Radio 
                        name="radioGroup"
                        inline
                        value = "body"
                        checked = {this.props.selectedOption === 'body'}
                        onChange = {this.handleChange}
                    >
                        Body
                    </Radio>
                </FormGroup>
            </div>
        )
    }
}
