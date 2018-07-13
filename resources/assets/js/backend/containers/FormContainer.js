import React from "react";

import { InputFile } from "../components/Form";
import { PrimaryButton } from "../components/Button";
import { UploadModal } from "../components/Modal";
import { DisplayImagesFromInputFile } from "../components/DisplayImage";
import reducer from "../reducers/FancyInputReducer";
import InputValueContext from "../contexts/InputValueContext";


export class SimpleInput extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      file: {}
    };
    this.addFile = this.addFile.bind(this);
  }

  addFile(newFile) {
    this.setState({
      file: newFile
    });
  }

  render() {
    const inputStyle = {
      display: 'none'
    };

    const preview = this.props.image ?
      <img src={this.props.image} alt="image" className="img-responsive"/> : 'No file uploaded';
    return (
      <React.Fragment>
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
      </React.Fragment>

    );
  }
}

SimpleInput.defaultProps = {
  i: 1
};


export class FancyInput extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      modalShow: false,
      inputValue: this.props.initialInputValue,
      dispatch: action => {
        this.setState(state => reducer(state, action))
      },
    };
  }

  render() {
    console.log('FANCYINPUT: RENDERING');

    const { inputValue, dispatch } = this.state;

    const { inputName, initialInputValue, dusk } = this.props;

    const preview = inputValue !== initialInputValue ?
      <img src={`/uploads/${inputValue}`} alt="image" className="img-responsive"/> : 'No file uploaded';

    return (
      <React.Fragment>
        <input type="hidden" name={inputName} value={inputValue}/>

        {/* preview */}
        <div className="form-group">
          <strong>New Image</strong>
          <div className="new-image">{preview}</div>
        </div>

        <div className="form-group">
          <PrimaryButton dusk={dusk} onClick={() => dispatch({ type: 'SHOW_MODAL' })}>
            Upload Image
          </PrimaryButton>
        </div>

        <InputValueContext.Provider value={this.state}>
          <UploadModal store={this.state}/>
        </InputValueContext.Provider>

      </React.Fragment>
    );
  }
}

FancyInput.defaultProps = {
  inputName: "gallery_image",
  initialInputValue: "",
  dusk: '',
};
