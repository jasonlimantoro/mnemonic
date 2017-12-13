require('./bootstrap');

import ReactDOM from "react-dom";
import React from "react";
import { ButtonContainer } from './containers/ButtonContainer';
import { FormContainer } from './containers/FormContainer';

const APPS = {
    ButtonContainer,
    FormContainer
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
  .forEach(renderAppInElement)
