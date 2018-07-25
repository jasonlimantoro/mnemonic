import React from "react";
import styled from "styled-components";

const SimplePagination = ({
  currentPage,
  optionalClass,
  totalPages,
  onChangeOffset,
  onChangePage,
  className,
}) => {

  const handleChangeOffset = (e, offset) => {
    e.preventDefault();
    onChangeOffset(offset);
  };

  const handleChangePage = (e) => {
    e.preventDefault();
    const page = parseInt(e.target.innerHTML);
    onChangePage(page);
  };

  let paginateItems = [];
  for (let page = 1; page <= totalPages; page++) {
    paginateItems.push(
      <li
        key={page}
        className={currentPage === page ? "active" : ""}
      >
        <a href="#" onClick={handleChangePage}>
          {page}
        </a>
      </li>
    );
  }
  return (
    <ul className={"pagination " + className}>
      <li className={currentPage === 1 ? "disabled" : ""}>
        <a
          href="#"
          aria-label="Previous"
          onClick={(e) => handleChangeOffset(e, -1)}
        >
          <span>«</span>
        </a>
      </li>
      {paginateItems}
      <li className={currentPage === totalPages ? "disabled" : ""}>
        <a
          href="#"
          onClick={(e) => handleChangeOffset(e, 1)}
          aria-label="Next"
        >
          <span>»</span>
        </a>
      </li>
    </ul>
  );
};

export const StyledPagination = styled(SimplePagination)`
  padding-left: 15px;
`;

