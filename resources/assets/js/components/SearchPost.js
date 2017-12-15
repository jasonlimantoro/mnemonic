import React from "react";

export class SearchPost extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            'columnName': 'title',
            'columnIndex': 0
        }
    }

    componentWillReceiveProps(nextprops) {
        const col = (nextprops.selectedOption === 'title') ? 0: 1;
        this.setState({
            columnName: nextprops.selectedOption,
            columnIndex: col
        });
    }

    filter() {
        var input, filter, table, tr, td;
        filter = this.props.value.toUpperCase();
        table = document.getElementsByClassName('table')[0];
        tr = table.getElementsByTagName('tr');
        var columnIndex = this.state.columnIndex;
        for (let i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByClassName('post-data')[columnIndex];
            if (td) {
                if (td.innerText.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = '';
                }
                else
                    tr[i].style.display = 'none';
            }
        }
    }
    render() {
        return (
            <div>
                {this.filter()}
                <p> Best match in {this.props.selectedOption} for: <strong>{this.props.value}</strong> </p>
            </div>

        )
    }
}