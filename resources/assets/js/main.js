require('./bootstrap');

import ReactDOM from "react-dom";
import React from "react";
import { Search, FancyInput, CoupleForm, SimpleInput } from './containers/FormContainer';
import { DeleteIcon, EditIcon, ShowIcon } from "./containers/IconContainer";

const APPS = {
	Search, CoupleForm,
	FancyInput, SimpleInput,
    DeleteIcon, EditIcon, ShowIcon
};

function renderAppInElement(el) {
  var App = APPS[el.id];
  if (!App) return;

  // get props from elements data attribute, like the post_id
  const props = Object.assign({}, el.dataset);

  ReactDOM.render(<App {...props} />, el);
}

document
  .querySelectorAll('.__react-root')
  .forEach(renderAppInElement);
