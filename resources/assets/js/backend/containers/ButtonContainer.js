import React from "react";
import ReactDOM from "react-dom";
import { PrimaryButton, SuccessButton } from "../components/Button";
import { PlusIcon } from "../components/Icon";

export class UpdateButton extends React.Component {
    popUp() {
        let msg = "blah";
        alert(msg);
    }

    render() {
        return (
            <PrimaryButton text="Update" type="submit" />
        );
    }
}

export class PublishButton extends React.Component {
    render() {
        return (
            <PrimaryButton text="Publish" type="submit" />
            
        );
    }
}

export class AddNewPostButton extends React.Component {
    render() {
        return (
            <div>
                <SuccessButton text="Add New Post">
                    <PlusIcon />
                </SuccessButton>
            </div>
        );
    }
}
