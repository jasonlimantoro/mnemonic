import React from "react";

function DisplayOutside(file, fromGallery=true){
    var preview = document.querySelector('.preview');

    while (preview.firstChild) {
        preview.removeChild(preview.firstChild);
    }

    if (!file) {
        var para = document.createElement('p');
        para.textContent = "No file uploaded";
        preview.appendChild(para);
    } 
    else {
        var divItem = document.createElement('div');
        var para = document.createElement('p');
        para.textContent = file.name;
        var img = document.createElement('img');
        if (fromGallery) {
            img.src = file.url_cache;
        }
        else {
            // from input file
            img.src = window.URL.createObjectURL(file);
        }
        img.classList.add('img-responsive');

        divItem.appendChild(img);
        divItem.appendChild(para);
        
        preview.appendChild(divItem);
        
    }
}
export class DisplayImagesFromInputFile extends React.Component {
    constructor(props){
        super(props);
    }

    render(){
        var file = this.props.file;
        var preview = "No images uploaded";
        if (file.length > 0){
            var src = window.URL.createObjectURL(file[0]);
            preview = <img src={src} className="img-responsive" alt="temp" />;
        }
        if (this.props.displayOutside) {
            DisplayOutside(file[0], false);
        }
        return (
            <p>{preview}</p>
        );
    }
}

DisplayImagesFromInputFile.defaultProps = {
    file : [],
    displayOutside: false
};

export class DisplayImagesFromSelectedGallery extends React.Component {
    constructor(props){
        super(props);
    }
    render(){
        DisplayOutside(this.props.file, true);
        return null
    }
}