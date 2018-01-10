import React from "react";
import ReactDOM from "react-dom";
import { FormPost, SearchBox, RadioButton, InputFile, TextArea, SelectForm } from "../components/Form";
import { SearchPost } from "../components/SearchPost";
import { PrimaryButton, SuccessButton } from "../components/Button";
import { UploadModal } from "../components/Modal";
import { DisplayImages, DisplayImagesFromInputFile } from "../components/DisplayImage";


export class FormforHome extends React.Component {
    render() {
        return <FormPost action="/admin/pages/1/post" />
    }
}

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

export class CarouselForm extends React.Component {
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
        return (
            <div>
                <PrimaryButton text="Upload Image" onClick={this.showModal} />

                <div className="preview" style={{marginTop:20}}>No file uploaded</div>
                <input type="hidden" name="gallery_image" id="inputGalleryImage" />
                <input type="file" name="image" id="inputFileOutside" style={inputStyle} />
                <UploadModal show={this.state.modalShow} onHide={this.closeModal} />
                
                <TextArea 
                    name="caption" 
                    label="Enter Caption"
                    placeholder="Enter something amazing"
                />
                <PrimaryButton text="Publish" type="submit" />

            </div>

        );
    }
}

export class AlbumForm extends React.Component {
    constructor(props){
        super(props);
        this.state = {
            file : []
        };
        this.addFile = this.addFile.bind(this);
    }

    addFile(newFile) {
        this.setState({
            file: newFile
        });
    }

    render() {
        return (
            <form action="/admin/galleries/images/store" method="POST" encType="multipart/form-data">
                <InputFile 
                    label = "Open file browser"
                    labelClass = "btn btn-success"
                    name = "image"
                    onChange = {this.addFile}
                />
                <DisplayImagesFromInputFile file={this.state.file} />
                <SelectForm label="Assign to album: " name="album">
                    <option defaultValue="4">Select Album</option>
                    <option value="1">Engagement</option>
                    <option value="2">Pre-Wedding</option>
                    <option value="3">Graduation</option>
                    <option value="4">Uncategorized</option>
                </SelectForm>

                <PrimaryButton type="submit" text="Upload" />
            </form>
        )
    }
}
