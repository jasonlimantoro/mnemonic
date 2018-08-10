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
      <LinkButton type="submit" style={{ padding: 0 }} data-toggle="tooltip" title="Delete" data-placement="top">
        <i className="fa fa-trash-o" style={{ fontSize: '24px', color: 'black' }}></i>
      </LinkButton>
    </form>
  );
};

