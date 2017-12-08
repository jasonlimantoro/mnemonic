import React from "react";
import ReactDOM from "react-dom";
import { Form } from "../components/Form";


class FormContainer extends React.Component {
    render() {
        return (
            <div>
                <Form />

            </div>
        )
    }
}

ReactDOM.render(
    <FormContainer />,
    document.getElementById('form')
)