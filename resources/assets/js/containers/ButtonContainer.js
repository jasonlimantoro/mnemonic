import React from "react";
import ReactDOM from "react-dom";
import { PrimaryButton, SuccessButton } from "../components/Button";

class ButtonContainer extends React.Component {
    popUp() {
        let msg = "blah";
        alert(msg);
    }

    render() {
        return (
            <div>
                <PrimaryButton text="Publish" />
            </div>
        )
    }
}

ReactDOM.render(
    <ButtonContainer />,
    document.getElementById('button')
)

