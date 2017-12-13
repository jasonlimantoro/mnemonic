import React from "react";
import ReactDOM from "react-dom";
import { FormPost } from "../components/Form";


export class FormContainer extends React.Component {
    render() {
        return <FormPost />
    }
}

// ReactDOM.render(
//     <FormContainer />,
//     document.getElementById('form')
// );