import React from "react";
import { Modal, Tabs, Tab } from "react-bootstrap";
import { DangerButton } from "./Button";
import { GalleryTabs } from "./Tab";
import { InputFile } from "./Form";
import { Request } from "./Request";

export const GalleryModal = (props) => {
    const inputStyle = {
        'opacity': 0,
        'display': 'inline'
    };
    return (
        <Modal {...props} bsSize="large" aria-labelledby="contained-modal-title-lg">
            <Modal.Header closeButton>
                <Modal.Title id="contained-modal-title-lg"> Media </Modal.Title>
            </Modal.Header>
            <Modal.Body>
                <GalleryTabs
                    uploadContent = {
                        <InputFile 
                            label = "Upload an Image"
                            labelClass = "btn btn-success"
                            name = "image"
                            style ={inputStyle}
                        />
                    }
                    
                    galleryContent = {
                        <Request source="https://mnemonic.dev/gallery-images" />
                    }
                    
                />

            </Modal.Body>
            <Modal.Footer>
                <DangerButton text="Publish" />
            </Modal.Footer>
        </Modal>
    );
}