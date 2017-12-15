import React from "react";
import ReactDOM from "react-dom";
import { FormPost, SearchBox } from "../components/Form";
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
            'placeholder': 'Search post title'
        }
        this.changeSearchValue = this.changeSearchValue.bind(this);
    }

    changeSearchValue(newValue) {
        this.setState({
            'searchValue': newValue
        });
    }

    render() {
        return (
            <div>
                <SearchBox onChange={this.changeSearchValue} value={this.state.searchValue} placeholder={this.state.placeholder} />
                <SearchPost value={this.state.searchValue} />
            </div>
        )

    }
}
