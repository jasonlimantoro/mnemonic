import React from "react";
import ReactDOM from "react-dom";
import { FormPost, SearchBox, RadioButton } from "../components/Form";
import { SearchPost } from "../components/SearchPost";


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
