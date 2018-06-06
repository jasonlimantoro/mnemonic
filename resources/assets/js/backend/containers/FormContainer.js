import React from "react";

// Custom Components
import { SearchBox, RadioButton, InputFile } from "../components/Form";
import { PrimaryButton } from "../components/Button";
import { UploadModal } from "../components/Modal";
import { DisplayImagesFromInputFile } from "../components/DisplayImage";
import { CoupleTabs } from "../components/Tab";


export class Search extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      'searchValue' : '',
      'selectedOption' : 'title',
      'placeholder': 'Search title'
    }
    this.changeSearchValue = this.changeSearchValue.bind(this);
    this.changeSelectedOption = this.changeSelectedOption.bind(this);
  }

  changeSearchValue(newValue) {
    const searchValue = newValue;
    this.setState({ searchValue });
    this.filter(searchValue);
  }

  changeSelectedOption (newOption) {
    const selectedOption = newOption;
    const placeholder = "Search " + newOption;
    this.setState({ selectedOption, placeholder });
  }

  filter(value) {
    var value = value.toUpperCase(); // the value to be searched
    var table = document.getElementsByClassName('table')[0];
    var tr = table.getElementsByTagName('tr');
    var columnIndex = this.state.selectedOption === 'title' ? 0 : 1;
    for (let i = 1; i < tr.length; i++) {
      var td = tr[i].getElementsByClassName('data-table')[columnIndex];
      if (td) {
        if (td.innerText.toUpperCase().indexOf(value) > -1) {
          tr[i].style.display = '';
        }
        else {
          tr[i].style.display = 'none';
				}
      }
    }
  }

  render() {
    const selected = this.state.selectedOption;
    return (
      <div>
        <SearchBox 
          onChange={this.changeSearchValue} 
          value={this.state.searchValue} 
          placeholder={this.state.placeholder}
        />
        <RadioButton 
          onChange = {this.changeSelectedOption}
          selectedOption = {selected}
        />
      </div>
    )
  }
}

export class CoupleForm extends React.Component{
  constructor(props){
    super(props);
  }

  render(){
    return (
      <CoupleTabs />
    );
  }
}

export class SimpleInput extends React.Component
{
  constructor(props)
  {
    super(props);
    this.state = {
      file : {} 
    }
    this.addFile = this.addFile.bind(this);
  }

  addFile(newFile) {
    this.setState({
      file: newFile
    });
  }

  render()
  {
    const inputStyle = {
      'display' : 'none'
    };
    
    const preview = this.props.image ? <img src={this.props.image} alt="image" className="img-responsive" /> : 'No file uploaded';
    return (
      <div>
        {/* new file */}
        <input type="file" name="image" id={"inputFileOutside" + '-' + this.props.i.toString()} style={inputStyle} />

        <div className="form-group">
          {/* preview */}
          <p><strong>New Image</strong></p>
          <div id={"preview" + '-' + this.props.i.toString() } className="new-image">{preview}</div>
        </div>
        <div className="form-group">
          <InputFile 
            label = "Open file browser"
            labelClass = "btn btn-success"
            name = "image"
            onChange = {this.addFile}
            i={this.props.i}
          />

          <DisplayImagesFromInputFile file={this.state.file} i={this.props.i} displayOutside displayBelow={false} />
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
      modalShow : false,
    };
    this.closeModal = this.closeModal.bind(this);
    this.showModal = this.showModal.bind(this);
  }
  closeModal() {
    this.setState({
      modalShow : false
    });
  }

  showModal() {
    this.setState({
      modalShow : true
    });
  }

  render() {
    const inputStyle = {
      'display' : 'none'
    };
    
    const preview = this.props.image ? <img src={this.props.image} alt="image" className="img-responsive" /> : 'No file uploaded';
    return (
      <div>
        {/* old file */}
        <input type="hidden" name={this.props.galleryInputName} id={"inputGalleryImage" + '-' + this.props.i.toString()} />
        {/* new file */}
        <input type="file" name={this.props.newInputName} id={"inputFileOutside" + '-' + this.props.i.toString()} style={inputStyle} />

        <div className="form-group">
          {/* preview */}
          <strong>New Image</strong>
          <div id={"preview" + '-' + this.props.i.toString() } className="new-image">{preview}</div>
        </div>
        <div className="form-group">
          <PrimaryButton dusk={this.props.dusk} text="Upload Image" onClick={this.showModal} />
        </div>
        <UploadModal show={this.state.modalShow} onHide={this.closeModal} i={this.props.i} />
      </div>
    );
  }
}
FancyInput.defaultProps = {
	i : 1,
	galleryInputName :  "gallery_image",
	newInputName : "image",
	dusk : ''
}

export class IconAndLogoInput extends React.Component
{
	constructor(props)
	{
		super(props);
	}
	render()
	{
		return (
			<div>
					<div className="col-md-4">
						<FancyInput i={1} galleryInputName="favicon_from_gallery" newInputName="favicon_from_local" dusk="favicon-upload" />
					</div>
					<div className="col-md-4">
						<FancyInput i={2} galleryInputName="logo_from_gallery" newInputName="logo_from_local" dusk="logo-upload" />
					</div>
			</div>
		);
	}
}