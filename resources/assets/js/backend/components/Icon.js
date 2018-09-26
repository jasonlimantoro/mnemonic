import React from "react";
import { LinkButton } from "./Button";
import { confirmAction } from "../functionals/helper";


export const DeleteIcon = ({ url }) => {
  return (
    <form action={url} method="POST" onSubmit={(e) => confirmAction(e, 'Are you sure you want to delete?')}>
      <input type="hidden" name="_method" value="DELETE"/>
      <LinkButton type="submit" style={{ padding: 0 }} data-toggle="tooltip" title="Delete" data-placement="top">
        <i className="fa fa-trash-o" style={{ fontSize: '24px', color: 'black' }}></i>
      </LinkButton>
    </form>
  );
};

