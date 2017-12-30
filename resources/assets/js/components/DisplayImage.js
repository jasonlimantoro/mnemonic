import React from "react";

export class GalleryImages extends React.Component {
    constructor(props){
        super(props);
    }

    updateDisplayImage(){
        // var input = document.querySelector('#inputFile');
        // var files = input.files;
        var preview = document.querySelector('.preview');

        var files = this.props.files;

        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        if (files.length === 0 ) {
            var para = document.createElement('p');
            para.textContent = "No file uploaded";
            preview.appendChild(para);
        } 
        else {
            for (let i = 0; i < files.length; i++) {
                var divItem = document.createElement('div');
                var para = document.createElement('p');
                para.textContent = files[i].name;
                var img = document.createElement('img');
                img.src = window.URL.createObjectURL(files[i]);
                img.classList.add('img-responsive');

                divItem.appendChild(img);
                divItem.appendChild(para);
                
                preview.appendChild(divItem);
            }
        }
    }
    render(){
        this.updateDisplayImage()
        return null;
    }
}