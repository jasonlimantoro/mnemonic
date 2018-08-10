import React from "react";
import StyledIcon from "../styles/icon";

const StyledLoading = StyledIcon.extend``

const Loading = () => (
  <div>
		<StyledLoading className="fa fa-spinner fa-spin"></StyledLoading> 
			Loading
  </div>
);

export default Loading;