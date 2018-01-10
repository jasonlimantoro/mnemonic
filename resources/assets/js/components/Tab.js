import React from "react";
import { Tab, Tabs, Nav, NavItem, NavDropdown, MenuItem, Row, Col } from "react-bootstrap";

export class MediaTabs extends React.Component {
    constructor(props) {
        super(props);
        this.handleSelect = this.handleSelect.bind(this);
    }

    handleSelect(key) {
        this.props.onSelect(key);
    }
    render() {
        return (
            <Tab.Container 
                id="tabs-with-dropdown" 
                activeKey={this.props.tabKey}
                onSelect={this.handleSelect}
            >
                <Row className="clearfix">
                    <Col md={12}>
                        <Nav bsStyle="tabs" style={{marginBottom: 20}}>
                            <NavItem eventKey="uploads">
                                Uploads
                            </NavItem>
                            <NavItem eventKey="gallery">
                                Gallery
                            </NavItem>
                        </Nav>
                    </Col>
                    <Col md={12}>
                        <Tab.Content animation>
                            <Tab.Pane eventKey="uploads">
                                Upload images from your local computer
                                {this.props.uploadContent}
                             </Tab.Pane>
                            <Tab.Pane eventKey="gallery">
                                Or, use your gallery instead!
                                {this.props.galleryContent}
                            </Tab.Pane>
                        </Tab.Content>
                    </Col>
                </Row>
            </Tab.Container>
        );
    }
}