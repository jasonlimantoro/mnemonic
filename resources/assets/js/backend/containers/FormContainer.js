import React from "react";

import {InputFile} from "../components/Form";
import {PrimaryButton} from "../components/Button";
import {UploadModal} from "../components/Modal";
import {DisplayImagesFromInputFile} from "../components/DisplayImage";
import {CoupleTabs} from "../components/Tab";

export const CoupleForm = () => (
  <CoupleTabs/>
);

export class SimpleInput extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      file: {}
    }
    this.addFile = this.addFile.bind(this);
  }

  addFile(newFile) {
    this.setState({
      file: newFile
    });
  }

  render() {
    const inputStyle = {
      'display': 'none'
    };

    const preview = this.props.image ?
      <img src={this.props.image} alt="image" className="img-responsive"/> : 'No file uploaded';
    return (
      <div>
        {/* new file */}
        <input type="file" name="image" id={"inputFileOutside" + '-' + this.props.i.toString()} style={inputStyle}/>

        <div className="form-group">
          {/* preview */}
          <p><strong>New Image</strong></p>
          <div id={"preview" + '-' + this.props.i.toString()} className="new-image">{preview}</div>
        </div>
        <div className="form-group">
          <InputFile
            label="Open file browser"
            labelClass="btn btn-success"
            name="image"
            onChange={this.addFile}
            i={this.props.i}
          />

          <DisplayImagesFromInputFile file={this.state.file} i={this.props.i} displayOutside displayBelow={false}/>
        </div>
      </div>

    );
  }

}

SimpleInput.defaultProps = {
  i: 1
}

export class FancyInput extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      modalShow: false,
    };
    this.closeModal = this.closeModal.bind(this);
    this.showModal = this.showModal.bind(this);
  }

  closeModal() {
    this.setState({
      modalShow: false
    });
  }

  showModal() {
    this.setState({
      modalShow: true
    });
  }

  render() {
    const inputStyle = {
      'display': 'none'
    };

    const preview = this.props.image ?
      <img src={this.props.image} alt="image" className="img-responsive"/> : 'No file uploaded';
    return (
      <div>
        {/* old file */}
        <input type="hidden" name={this.props.galleryInputName}
               id={"inputGalleryImage" + '-' + this.props.i.toString()}/>
        {/* new file */}
        <input type="file" name={this.props.newInputName} id={"inputFileOutside" + '-' + this.props.i.toString()}
               style={inputStyle}/>

        <div className="form-group">
          {/* preview */}
          <strong>New Image</strong>
          <div id={"preview" + '-' + this.props.i.toString()} className="new-image">{preview}</div>
        </div>
        <div className="form-group">
          <PrimaryButton dusk={this.props.dusk} onClick={this.showModal}>
            Upload Image
          </PrimaryButton>
        </div>
        <UploadModal show={this.state.modalShow} onHide={this.closeModal} i={this.props.i}/>
      </div>
    );
  }
}

FancyInput.defaultProps = {
  i: 1,
  galleryInputName: "gallery_image",
  newInputName: "image",
  dusk: ''
};
