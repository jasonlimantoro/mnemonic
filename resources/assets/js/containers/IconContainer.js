import React from "react";
import ReactDOM from "react-dom";
import { TrashIcon, PencilIcon, InfoIcon } from "../components/Icon";
import $ from "jquery";

const style = {
    'fontSize' : '24px',
    'color': 'black'
};

export class DeleteIcon extends React.Component {
    confirmDelete(e) {
        // Confirmation for any delete action
        if (!confirm('Are you sure you want to delete?')){
			e.preventDefault();
			return;
		} 
		e.preventDefault();
		var data = e.target.parentElement.getAttribute('data-form'); 
		$('#form-delete-' + data).submit();
		
    }
    render(){
        return <TrashIcon style={style} handleClick={this.confirmDelete} />
    }
}

export class EditIcon extends React.Component {
    render() {
        return <PencilIcon style={style} />
    }
}

export class ShowIcon extends React.Component {
    render() {
        return <InfoIcon style={style} />
    }
}
