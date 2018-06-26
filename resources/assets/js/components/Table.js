import React from "react";
import {Table} from "react-bootstrap";

export const RSVPTable = ({data}) => (
  <Table>
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

