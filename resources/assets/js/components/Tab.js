import React from "react";
import { Tab, Tabs, Nav, NavItem, NavDropdown, MenuItem, Row, Col } from "react-bootstrap";

export const GalleryTabs = (props) => {
    return (
        <Tab.Container id="tabs-with-dropdown" defaultActiveKey="uploads">
            <Row className="clearfix">
                <Col sm={12}>
                    <Nav bsStyle="tabs" style={{marginBottom: 20}}>
                        <NavItem eventKey="uploads">
                            Uploads
                        </NavItem>
                        <NavItem eventKey="gallery">
                            Gallery
                        </NavItem>
                    </Nav>
                </Col>
                <Col sm={12}>
                    <Tab.Content animation>
                        <Tab.Pane eventKey="uploads">
                            Upload images from your local computer
                            {props.uploadContent}
                         </Tab.Pane>
                        <Tab.Pane eventKey="gallery">
                            Or, use your gallery instead!
                            {props.galleryContent}
                        </Tab.Pane>
                    </Tab.Content>
                </Col>
            </Row>
        </Tab.Container>
    )
}