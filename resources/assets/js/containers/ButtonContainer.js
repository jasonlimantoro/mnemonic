import React from "react";
import ReactDOM from "react-dom";
import { PrimaryButton, SuccessButton } from "../components/Button";

export class UpdateButton extends React.Component {
    popUp() {
        let msg = "blah";
        alert(msg);
    }

    render() {
        return (
            <div>
                <PrimaryButton text="Update" type="submit" />
            </div>
        )
    }
}

export class PublishButton extends React.Component {
    render() {
        return (
            <PrimaryButton text="Publish" type="submit" />
        );
    }
}
