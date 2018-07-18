import React from "react";

const Refresh = ({loading, onRefresh }) => (
  <div>
    {loading ? "Refreshing..." : "Refresh"}{" "}
    <i className={`fa fa-refresh ${loading ? 'fa-spin' : ''}`}
       onClick={onRefresh}
       style={{ cursor: "pointer", fontSize: "24px"}}
    >
    </i>
  </div>
);

export default Refresh;

