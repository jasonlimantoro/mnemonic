import React from "react";
import PropTypes from "prop-types";

function DisplayOutside(file, fromGallery=true, i=1){
    var preview = document.querySelector('#preview-' + i.toString());

    if (file) {
		while (preview.firstChild) {
			preview.removeChild(preview.firstChild);
		}
		var img = document.createElement('img');
		img.classList.add('img-responsive');
		img.src = fromGallery ? file.attributes.url_cache : window.URL.createObjectURL(file);
		var divItem = document.createElement('div');

		divItem.appendChild(img);
		preview.appendChild(divItem);
    } 
}
export class DisplayImagesFromInputFile extends React.Component {
    constructor(props){
        super(props);
    }

    render(){
        var file = this.props.file;
        var preview = "No file uploaded";
        if (file.length > 0){
            // Display inside modal
            var src = window.URL.createObjectURL(file[0]);
            preview = <img src={src} className="img-responsive" alt="temp" />;
        }
        if (this.props.displayOutside) {
            DisplayOutside(file[0], false, this.props.i);
		}
		if (this.props.displayBelow)
		{
			return (
				<p>{preview}</p>
			);
		}
		else
		{ 
			return null;
		}
    }
}

DisplayImagesFromInputFile.propTypes = {
	file : PropTypes.object.isRequired,
	displayOutside : PropTypes.bool,
	displayBelow : PropTypes.bool
}

DisplayImagesFromInputFile.defaultProps = {
	file : {},
	displayOutside: false,
	displayBelow : true
};

export class DisplayImagesFromSelectedGallery extends React.Component {
    constructor(props){
        super(props);
    }
    render(){
        DisplayOutside(this.props.file, true, this.props.i);
        return null
    }
}