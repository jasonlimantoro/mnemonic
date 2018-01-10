import React from "react";
import { Modal, Tabs, Tab } from "react-bootstrap";
import { DangerButton } from "./Button";
import { MediaTabs } from "./Tab";
import { InputFile } from "./Form";
import { RequestImages } from "./Request";
import { DisplayImagesFromInputFile } from "./DisplayImage";

export class UploadModal extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            file : {},
            tabKey: 'uploads'
        };
        this.addFile = this.addFile.bind(this);
        this.changeTab = this.changeTab.bind(this);
    }

    addFile(newFile) {
        this.setState({
            file: newFile
        });
    }
    
    changeTab(newKey) {
        this.setState({
            tabKey: newKey
        });
    }
    render(){
        return (
            <Modal {...this.props} bsSize="large" aria-labelledby="contained-modal-title-lg">
                <Modal.Header closeButton>
                    <Modal.Title id="contained-modal-title-lg"> Media </Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <MediaTabs
                        tabKey = {this.state.tabKey}
                        onSelect = {this.changeTab}
                        uploadContent = {
                            <div>
                                <InputFile 
                                    label = "Open file browser"
                                    labelClass = "btn btn-success"
                                    name = "image"
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