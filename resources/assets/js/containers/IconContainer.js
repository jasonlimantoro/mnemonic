import React from "react";
import ReactDOM from "react-dom";
import { TrashIcon, EditIcon, InfoIcon } from "../components/Icon";

const style = {
    'fontSize' : '24px',
    'color': 'black'
};
export class DeletePostIcon extends React.Component {
    render(){
        return <TrashIcon style={style} />
    }
}

export class EditPostIcon extends React.Component {
    render() {
        return <EditIcon style={style} />
    }
}

export class InfoPostIcon extends React.Component {
    render() {
        return <InfoIcon style={style} />
    }
}
