import React from "react";
import PropTypes from "prop-types";

export class SimplePagination extends React.Component {
  constructor(props) {
		super(props);
		this.handleChangeOffset = this.handleChangeOffset.bind(this);
		this.handleChangePage = this.handleChangePage.bind(this);
	}
	
	handleChangeOffset(e, offset){
		e.preventDefault();
		this.props.onChangeOffset(offset);
	}

	handleChangePage(e){
		e.preventDefault();
		const page = parseInt(e.target.innerHTML);
		this.props.onChangePage(page);
	}

  render() {
    const totalPages = this.props.totalPages;
    let paginateItems = [];
    for (let page = 1; page <= totalPages; page++) {
      paginateItems.push(
        <li
          key={page}
          className={this.props.currentPage === page ? "active" : ""}
        >
          <a href="#" onClick={this.handleChangePage}>
            {page}
          </a>
        </li>
      );
    }
    return (
      <ul className={"pagination " + this.props.optionalClass}>
        <li className={this.props.currentPage == 1 ? "disabled" : ""}>
          <a
            href="#"
            aria-label="Previous"
            onClick={(e) => this.handleChangeOffset(e, -1)}
          >
            <span>«</span>
          </a>
        </li>
        {paginateItems}
        <li className={this.props.currentPage == totalPages ? "disabled" : ""}>
          <a
            href="#"
            onClick={(e) => this.handleChangeOffset(e, 1)}
            aria-label="Next"
          >
            <span>»</span>
          </a>
        </li>
      </ul>
    );
  }
}
SimplePagination.propTypes = {
  totalPages: PropTypes.number.isRequired,
  currentPage: PropTypes.number.isRequired,
  onChangePage: PropTypes.func.isRequired,
  onChangeOffset: PropTypes.func,
  optionalClass: PropTypes.string
};
