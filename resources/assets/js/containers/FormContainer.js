import React from "react";
import axios from "axios";

// Custom Components
import { FormPost, SearchBox, RadioButton, InputFile, TextArea, SelectForm } from "../components/Form";
import { SearchPost } from "../components/SearchPost";
import { PrimaryButton, SuccessButton } from "../components/Button";
import { UploadModal } from "../components/Modal";
import { DisplayImages, DisplayImagesFromInputFile } from "../components/DisplayImage";
import { CoupleTabs } from "../components/Tab";


export class Search extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            'searchValue' : '',
            'selectedOption' : '',
            'placeholder': ''
        }
        this.changeSearchValue = this.changeSearchValue.bind(this);
        this.changeSelectedOption = this.changeSelectedOption.bind(this);
    }

    changeSearchValue(newValue) {
        this.setState({
            'searchValue': newValue
        });
    }

    changeSelectedOption (newOption) {
        this.setState({
            selectedOption: newOption,
            placeholder: "Search post " + newOption
        });
    }
    componentWillMount() {
        // the first time when component will be mounted
        this.setState({
            selectedOption: 'title',
        })
    }

    componentDidMount() {
        // Add the placeholder after selectedOption is updated
        this.setState({
            placeholder: 'Search post ' + this.state.selectedOption
        });
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
                    selectedOption = {this.state.selectedOption}
                />
                <SearchPost 
                    value={this.state.searchValue} 
                    selectedOption={this.state.selectedOption}
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
                <input type="hidden" name="gallery_image" id={"inputGalleryImage" + '-' + this.props.i.toString()} />
				{/* new file */}
                <input type="file" name="image" id={"inputFileOutside" + '-' + this.props.i.toString()} style={inputStyle} />

				<div className="form-group">
					{/* preview */}
					<p><strong>New Image</strong></p>
					<div id={"preview" + '-' + this.props.i.toString() } className="new-image">{preview}</div>
				</div>
				<div className="form-group">
					<PrimaryButton text="Upload Image" onClick={this.showModal} />
				</div>
                <UploadModal show={this.state.modalShow} onHide={this.closeModal} i={this.props.i} />
            </div>

        );
    }
}
FancyInput.defaultProps = {
	i : 1 
}