import React from "react";

export class DisplayImages extends React.Component {
    constructor(props){
        super(props);
    }
    DisplayOutside(){
        var files = this.props.files;
        var preview = document.querySelector('.preview');

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
        var files = this.props.files;
        var preview = "No images uploaded";
        if (files.length > 0){
            var src = window.URL.createObjectURL(files[0]);
            preview = <img src={src} className="img-responsive" alt="temp" />;
        }
        if (this.props.displayOutside) {
            this.DisplayOutside();
        }
        return (
            <p>{preview}</p>
        );
    }
}

DisplayImages.defaultProps = {
    files : [],
    displayOutside: false
};