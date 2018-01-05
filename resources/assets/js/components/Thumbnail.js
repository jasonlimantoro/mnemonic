import React from "react";
import {Grid, Row, Col, Thumbnail, Button} from "react-bootstrap";
import { DisplayImagesFromSelectedGallery } from "./DisplayImage";

export class ThumbnailGallery extends React.Component {
    constructor(props){
        super(props);
    }


    render() {
        const activeClass = this.props.isActive ? 'active' : '';
        var display = '';
        if(this.props.isActive) {
            display = <DisplayImagesFromSelectedGallery file={this.props.selectedImage} />;
        }
        
        return (
            <Thumbnail 
                src={this.props.sourceImage} 
                className={'thumbnail-gallery ' + activeClass}
                alt="242x200"
            >
                <strong>{this.props.title}</strong>
                <p>{this.props.description}</p>
                {display}
                
            </Thumbnail>
        )
    }
}