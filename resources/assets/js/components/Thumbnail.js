import React from "react";
import {Grid, Row, Col, Thumbnail, Button} from "react-bootstrap";

export class ThumbnailGallery extends React.Component {
    constructor(props){
        super(props);
    }


    render() {
        const activeClass = this.props.isActive ? 'active' : '';
        return (
            <Thumbnail 
                src={this.props.sourceImage} 
                className={'thumbnail-gallery ' + activeClass}
                alt="242x200"
            >
                <strong>{this.props.title}</strong>
                <p>{this.props.description}</p>
            </Thumbnail>
        )
    }
}