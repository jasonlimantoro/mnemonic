import React from "react";
import { Modal, Tabs, Tab } from "react-bootstrap";
import { DangerButton } from "./Button";
import { GalleryTabs } from "./Tab";
import { InputFile } from "./Form";
import { RequestImages } from "./Request";
import { DisplayImagesFromInputFile } from "./DisplayImage";

export class UploadModal extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            file : {}
        };
        this.addFile = this.addFile.bind(this);
    }

    addFile(newFile) {
        this.setState({
            file: newFile
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

                                <DisplayImagesFromInputFile file={this.state.file} displayOutside={true} />
                            </div>
                        }
                        
                        galleryContent = {
                            <RequestImages source="/api/images" />
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