import React from "react";
import { FormGroup, FormControl, ControlLabel, Radio } from "react-bootstrap";
import { PrimaryButton, SuccessButton } from "./Button";

function FieldGroup ( {id, label, labelClass, ...props}) {
    return (
        <FormGroup controlId={id}>
            <ControlLabel className={labelClass}>{label}</ControlLabel>
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
                Search Parameters:
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

export class InputFile extends React.Component {
    constructor(props){
        super(props);
        this.handleChange = this.handleChange.bind(this);
    }

    handleChange(e) {
        var files = e.target.files;
        this.props.onChange(files);
        document.getElementById('inputFileOutside').files = files;
    }
    render(){
        return (
            <FieldGroup 
                id="inputFile"
                type="file"
                label= {this.props.label}
                labelClass= {this.props.labelClass}
                name= {this.props.name}
                style={this.props.style}
                onChange = {this.handleChange}
            />
        );
    }
}

export const TextArea = (props) => {
    return (
        <div>
            <FieldGroup
                componentClass = "textarea"
                name = {props.name}
                label = {props.label}
                placeholder = {props.placeholder}
                rows = "10"
                cols = "30"
            />
        </div>
    )
}
