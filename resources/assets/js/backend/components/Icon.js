import React from "react";
import {LinkButton} from "./Button";

export const DeleteIcon = ({ url }) => {
  const confirmDelete = (e) => {
    if (!confirm('Are you sure you want to delete?')) {
      e.preventDefault();
      return false;
    }
  };

  return (
    <form action={url} method="POST" onSubmit={confirmDelete}>
      <input type="hidden" name="_method" value="DELETE"/>
      <LinkButton submit style={{padding: 0}}>
        <i className="fa fa-trash-o"></i>
      </LinkButton>
    </form>
  );
};

