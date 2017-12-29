import React from "react";
import {Grid, Row, Col, Thumbnail, Button} from "react-bootstrap";

export class ThumbnailGallery extends React.Component {
    constructor(props){
        super(props);
    }
    render() {
        return (
            <div>
                <Col xs={6} md={4}>
                    <Thumbnail src={this.props.sourceImage} alt="242x200">
                        <h3>{this.props.title}</h3>
                        <p>{this.props.description}</p>
                    </Thumbnail>
                </Col>
            </div>
        )
    }
}