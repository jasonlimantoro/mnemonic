import React from "react";
import ReactDOM from "react-dom";
import { FormPost } from "../components/Form";


export class FormforHome extends React.Component {
    render() {
        return <FormPost action="/admin/pages/1/post" />
    }
}

// ReactDOM.render(
//     <FormContainer />,
//     document.getElementById('form')
// );