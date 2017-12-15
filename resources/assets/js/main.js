require('./bootstrap');

import ReactDOM from "react-dom";
import React from "react";
import { UpdateButton, PublishButton, AddNewPostButton } from './containers/ButtonContainer';
import { FormforHome } from './containers/FormContainer';
import { DeletePostIcon } from "./containers/IconContainer";

const APPS = {
    UpdateButton, PublishButton, AddNewPostButton,
    FormforHome,
    DeletePostIcon
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
