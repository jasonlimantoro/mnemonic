require('../bootstrap');

import ReactDOM from "react-dom";
import React from "react";
import { FancyInput, CoupleForm, SimpleInput, IconAndLogoInput } from './containers/FormContainer';
import { DeleteIcon, EditIcon, ShowIcon } from "./containers/IconContainer";
import { UploadModal } from "./components/Modal";
import { InitializeEditor } from "./components/Editor";

const APPS = {
    CoupleForm,
    FancyInput, SimpleInput,
    DeleteIcon, EditIcon, ShowIcon, IconAndLogoInput,
    UploadModal,
    InitializeEditor,
};

function renderAppInElement(el) {
    var App = APPS[el.id];
    if (!App) {return;}

    // get props from elements data attribute, like the post_id
    const props = Object.assign({}, el.dataset);

    ReactDOM.render(<App {...props} />, el);
}

document
.querySelectorAll('.__react-root')
.forEach(renderAppInElement);
