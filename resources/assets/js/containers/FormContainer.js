import React from "react";
import ReactDOM from "react-dom";
import { FormPost, SearchBox, RadioButton, InputFile, TextArea } from "../components/Form";
import { SearchPost } from "../components/SearchPost";
import { PrimaryButton, SuccessButton } from "../components/Button";
import { GalleryModal } from "../components/Modal";


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
            'modalShow' : false
        };
        this.closeModal = this.closeModal.bind(this);
        this.showModal = this.showModal.bind(this);
    }
    closeModal() {
        this.setState({
            'modalShow' : false
        });
    }

    showModal() {
        this.setState({
            'modalShow' : true
        });
    }

    render() {
        const inputStyle = {
            'opacity': 0,
            'display': 'inline'
        };
        return (
            <div>
                <PrimaryButton text="Upload Image" onClick={this.showModal} />

                <GalleryModal show={this.state.modalShow} onHide={this.closeModal} />
                
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
