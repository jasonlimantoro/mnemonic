require('./bootstrap');

import ReactDOM from "react-dom";
import React from "react";
import { UpdateButton, PublishButton, AddNewPostButton } from './containers/ButtonContainer';
import { FormforHome, Search } from './containers/FormContainer';
import { DeletePostIcon, EditPostIcon } from "./containers/IconContainer";

const APPS = {
    UpdateButton, PublishButton, AddNewPostButton,
    FormforHome, Search,
    DeletePostIcon, EditPostIcon
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
