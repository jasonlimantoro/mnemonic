import React from "react";

export class SearchPost extends React.Component {
    constructor(props) {
        super(props);
    }

    filter() {
        var input, filter, table, tr, td;
        // input = document.getElementById('Search');
        filter = this.props.value.toUpperCase();
        table = document.getElementsByClassName('table')[0];
        tr = table.getElementsByTagName('tr');

        for (let i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName('td')[0]
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
                <p> Best match for: <strong>{this.props.value}</strong> </p>
            </div>

        )
    }
}