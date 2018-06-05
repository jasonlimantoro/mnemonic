import React from 'react';

export const PlusIcon = (props) => {
    return (
        <i className="fa fa-plus" style={props.style}></i>
    );
}

export const TrashIcon = (props) => {
    return (
        <i className="fa fa-trash-o" style={props.style} onClick={props.handleClick}></i>
    );
}

export const PencilIcon = (props) => {
    return (
        <i className="fa fa-pencil-square-o" style={props.style}></i>
    );
}

export const InfoIcon = (props) => {
    return (
        <i className="fa fa-info-circle" style={props.style}></i>
    );
}