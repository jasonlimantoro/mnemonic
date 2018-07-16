import React from "react";
import PropTypes from "prop-types";
import { FormGroup, ControlLabel, Image } from "react-bootstrap";

import { InputFile } from "../components/Form";
import { PrimaryButton } from "../components/Button";
import { UploadModal } from "../components/Modal";
import reducer from "../reducers/FancyInputReducer";
import FancyInputContext, { withFancyInput } from "../contexts/FancyInputContext";
import AjaxStatus from "../components/AjaxStatus";


export class SimpleInput extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      file: {},
      previewUrl: '',
      loading: false,
      showAlert: false,
      status: '',
      message: '',
    };
    this.uploadFile = this.uploadFile.bind(this);
    this.handleDismiss = this.handleDismiss.bind(this);
  }

  uploadFile(file, previewUrl) {
    this.setState({loading : true}, () => {
      setTimeout(() => {
        this.setState({
          showAlert: true,
          loading: false,
          status: 'success',
          message: 'Nice! The file is available for preview',
          file,
          previewUrl,
        });
      }, 1000);
    });
  }

  handleDismiss() {
    this.setState({
      showAlert : false,
    });
  }

  render() {
    const { uploadFile, handleDismiss, state : {file, previewUrl, ...ajaxState}, props : {template} } = this;

    const preview = previewUrl ?
      <Image src={previewUrl} alt="image" responsive /> : 'No file uploaded';

    return (
      <React.Fragment>

        <input type="hidden" name="template" value={template}/>

        <FormGroup controlId="preview">
          <ControlLabel>New Image</ControlLabel>
          <div className="new-image">{preview}</div>
        </FormGroup>

        <InputFile
          label="Open file browser"
          labelClass="btn btn-success"
          name="image"
          onChange={uploadFile}
        />
        <AjaxStatus {...ajaxState} onDismiss={handleDismiss}/>
      </React.Fragment>
    );
  }
}

SimpleInput.propTypes = {
  template: PropTypes.string,
};

SimpleInput.defaultProps = {
  template : "gallery",
};

const ModalWithContext = withFancyInput(UploadModal);

export class FancyInput extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      modalShow: false,
      inputValue: this.props.initialInputValue,
      template : this.props.template,
      dispatch: action => {
        this.setState(state => reducer(state, action))
      },
    };
  }

  render() {
    const { inputValue, dispatch } = this.state;

    const { inputName, initialInputValue } = this.props;

    const preview = inputValue !== initialInputValue ?
      <img src={`/uploads/${inputValue}`} alt="image" className="img-responsive" style={{ maxWidth: '50%'}}/> : 'No file uploaded';

    return (
      <React.Fragment>
        <input type="hidden" name={inputName} value={inputValue}/>

        {/* preview */}
        <div className="form-group">
          <strong>New Image</strong>
          <div className="new-image">{preview}</div>
        </div>

        <div className="form-group">
          <PrimaryButton onClick={() => dispatch({ type: 'SHOW_MODAL' })}>
            Upload Image
          </PrimaryButton>
        </div>

        <FancyInputContext.Provider value={this.state}>
          <ModalWithContext />
        </FancyInputContext.Provider>

      </React.Fragment>
    );
  }
}

FancyInput.propTypes = {
  template: PropTypes.string,
  inputName: PropTypes.string,
  initialInputValue: PropTypes.string,
};

FancyInput.defaultProps = {
  template: "gallery",
  inputName: "gallery_image",
  initialInputValue: "",
};
