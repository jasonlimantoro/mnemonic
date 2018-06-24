import React from "react";
import {FancyInput} from "../containers/FormContainer";

export const DeleteIcon = () => {
    const style = {
        'fontSize' : '24px',
        'color': 'black'
    };
    const confirmDelete = (e) => {
        e.preventDefault();
        if (!confirm('Are you sure you want to delete?')){
			return;
		} 
		let data = e.target.parentElement.getAttribute('data-form');
		$('#form-delete-' + data).submit();
    };
    return <i className="fa fa-trash-o" style={style} onClick={confirmDelete}></i>
};

export const IconAndLogoInput = () => (
  <div>
    <div className="col-md-4">
      <FancyInput i={1} galleryInputName="favicon_from_gallery" newInputName="favicon_from_local"
                  dusk="favicon-upload"/>
    </div>
    <div className="col-md-4">
      <FancyInput i={2} galleryInputName="logo_from_gallery" newInputName="logo_from_local" dusk="logo-upload"/>
    </div>
  </div>
);