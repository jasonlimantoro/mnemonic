import React from "react";
import {Grid, Row, Col, Thumbnail, Button} from "react-bootstrap";

export class ThumbnailGallery extends React.Component {
    constructor(props){
        super(props);
        this.handleClick = this.handleClick.bind(this);
        this.state = {
            isActive : false
        };
    }

    handleClick(){
        this.setState(prevState => ({
            isActive : !prevState.isActive
        }));
    }
    render() {
        var activeClass = this.state.isActive ? 'active' : '';
        return (
            <div>
                <Col xs={6} md={4}>
                    <Thumbnail src={this.props.sourceImage} className={'thumbnail-gallery ' + activeClass} alt="242x200" onClick={this.handleClick}>
                        <strong>{this.props.title}</strong>
                        <p>{this.props.description}</p>
                    </Thumbnail>
                </Col>
            </div>
        )
    }
}