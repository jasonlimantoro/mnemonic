import React from "react";
import {Grid, Row, Col, Thumbnail, Button} from "react-bootstrap";
import { DisplayImagesFromSelectedGallery} from "./DisplayImage";

export class ThumbnailGallery extends React.Component {
    constructor(props){
        super(props);
    }

    render() {
		const isActive = this.props.isActive;
        return (
            <Thumbnail 
                src={this.props.sourceImage} 
                className={isActive ? 'thumbnail-gallery active' : 'thumbnail-gallery'}
                alt="242x200"
            >
                <strong>{this.props.title}</strong>
                <p>{this.props.description}</p>
				{isActive ? 
					<DisplayImagesFromSelectedGallery file={this.props.selectedImage} i={this.props.i} fromGallery />
				:	null 
				}
                
            </Thumbnail>
        )
    }
}

ThumbnailGallery.defaultProps = {
	description : null
}