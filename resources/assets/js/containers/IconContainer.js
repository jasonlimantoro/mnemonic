import React from "react";
import ReactDOM from "react-dom";
import { TrashIcon } from "../components/Icon";

export class DeletePostIcon extends React.Component {
    render(){
        const style = {
            'fontSize' : '24px',
            'color': 'grey'
        };
        return <TrashIcon style={style} />
    }
}