import React from "react";
import styled from "styled-components";

import {Table} from "react-bootstrap";

const RSVPTable = ({data, ...rest}) => (
  <Table {...rest}>
    <tbody>
    <tr>
      <td> RSVP No</td>
      <td>
        {" "}
        : #{data.id.toString().padStart(4, "0")}{" "}
      </td>
    </tr>
    <tr>
      <td> Attendee</td>
      <td> : {data.name} </td>
    </tr>
    {data.table_name ? (
      <tr>
        <td> Name of Table</td>
        <td> : {data.table_name} </td>
      </tr>
    ) : (
      ""
    )}
    <tr>
      <td> Table for</td>
      <td> : {data.total_invitation} </td>
    </tr>
    <tr>
      <td> Email</td>
      <td> : {data.email} </td>
    </tr>

    {data.phone ? (
      <tr>
        <td> Phone</td>
        <td> : {data.phone} </td>
      </tr>
    ) : (
      ""
    )}
    </tbody>
  </Table>

);

export const StyledRSVPTable = styled(RSVPTable)`
  margin: 20px;
  td {
    border: none !important;
    text-align: left;
  }
`;

