import React from "react";
import Loading from "./Loading";
import { ErrorAlert, SuccessAlert } from "./Alert";


const AjaxStatus = ({ loading, showAlert, status, message, ...rest }) => {
  if (loading) {
    return <Loading/>;
  } else {
    if (showAlert) {
      if (status === 'success') {
        return (
          <SuccessAlert {...rest}>
            {message || 'Success!!'}
          </SuccessAlert>
        );
      } else {
        return (
          <ErrorAlert {...rest}>
            {message || 'Error!'}
          </ErrorAlert>
        )
      }
    } else {
      return null;
    }
  }
};

export default AjaxStatus;