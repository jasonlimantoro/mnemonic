import React from "react";
import {Grid, Row, Col, Thumbnail, Button} from "react-bootstrap";
import { DisplayImagesFromSelectedGallery} from "./DisplayImage";

export class ThumbnailGallery extends React.Component {
    constructor(props){
        super(props);
	}
	
	str_limit(str, length=20, ending='...')
	{
		if(str.length > length)
		{
			return str.substring(0, length) + ending;
		}
		else 
		{
			return str;
		}
	}

    render() {
		const isActive = this.props.isActive;
        return (
            <Thumbnail 
                src={this.props.sourceImage} 
                className={isActive ? 'thumbnail-gallery active' : 'thumbnail-gallery'}
                alt="242x200"
            >
                Name: <strong>{this.str_limit(this.props.title)}</strong><br/>
                Album: <strong>{this.props.description}</strong>
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