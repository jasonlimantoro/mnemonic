import React from "react";
import styled from "styled-components";
import StyledIcon from "../styles/icon";

const StyledRefresh = StyledIcon.extend`
	cursor: pointer;
`;

const Refresh = ({loading, onRefresh }) => (
  <div>
    {loading ? "Refreshing..." : "Refresh"}{" "}
		<StyledRefresh 
			className={`fa fa-refresh ${loading ? 'fa-spin' : ''}`}
      onClick={onRefresh}
    >
    </StyledRefresh>
  </div>
);

export default Refresh;
