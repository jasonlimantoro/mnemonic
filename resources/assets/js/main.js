require('./bootstrap');

import ReactDOM from "react-dom";
import React from "react";
import { RSVPTimer } from "./components/RSVPTimer";
import { GalleryModal, RSVPModal } from "./components/Modal";
import { AlbumSlider, BridesBestSlider } from "./components/Slider";

const APPS = {
	RSVPTimer, RSVPModal,
	AlbumSlider, GalleryModal,
	InitializeEditor,
	BridesBestSlider,
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
