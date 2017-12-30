import React from "react";
import { Modal, Tabs, Tab } from "react-bootstrap";
import { DangerButton } from "./Button";
import { GalleryTabs } from "./Tab";
import { InputFile } from "./Form";
import { Request } from "./Request";
import { GalleryImages } from "./DisplayImage";

export class GalleryModal extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            files : []
        };
        this.addFile = this.addFile.bind(this);
    }

    addFile(newFile) {
        this.setState({
            files: newFile
        });
    }
    render(){
        const inputStyle = {
            'opacity': 0,
            'display': 'inline'
        };
        return (
            <Modal {...this.props} bsSize="large" aria-labelledby="contained-modal-title-lg">
                <Modal.Header closeButton>
                    <Modal.Title id="contained-modal-title-lg"> Media </Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <GalleryTabs
                        uploadContent = {
                            <div>
                                <InputFile 
                                    label = "Open file browser"
                                    labelClass = "btn btn-success"
                                    name = "image"
                                    style ={inputStyle}
                                    onChange = {this.addFile}
                                />

                                <GalleryImages files={this.state.files} />
                            </div>
                        }
                        
                        galleryContent = {
                            <Request source="https://mnemonic.dev/gallery-images" />
                        }
                        
                    />
    
                </Modal.Body>
                <Modal.Footer>
                    <DangerButton text="Done" onClick={this.props.onHide} />
                </Modal.Footer>
            </Modal>
        );
    }
}