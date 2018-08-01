<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>RSVP Confirmed</title>
</head>
<style>
  html, body {
    min-height: 100vh;
    background-color: #fcfbe8;
  }
  .full-height {
    height: 100vh;
  }
  h1, p {
    text-align: center;
  }

  /* Responsive typography */
  html { font-size: 1rem; }
  @media (min-width: 576px) { html { font-size: 1.1rem; } }
  @media (min-width: 768px) { html { font-size: 1.2rem; } }
  @media (min-width: 992px) { html { font-size: 1.3rem; } }
  @media (min-width: 1200px) { html { font-size: 1.4rem; } }

</style>
<body>
<div class="container">
  <div class="row full-height justify-content-center align-items-center">
    <div class="col-sm">
      <h1>
        The Wedding of {{ strtok($groom->name, " ") }} and {{ strtok($bride->name, " ") }}
      </h1>
      <div class="alert alert-success text-center" role="alert">
        We have confirmed your reservation and sent you the following details to <a href="mailto:{{ $rsvp->email }}">{{ $rsvp->email }}</a>!
      </div>
      <div class="table-responsive">
        @component('layouts.table')
          @slot('tableBody')
            <tr>
              <td>RSVP Code</td>
              <td>#{{ str_pad($rsvp->id, 4, 0, STR_PAD_LEFT) }}</td>
            </tr>

            <tr>
              <td>Attendee</td>
              <td>{{ $rsvp->name }}</td>
            </tr>

            <tr>
              <td>Table Name</td>
              <td>{{ $rsvp->table_name }}</td>
            </tr>

            <tr>
              <td>Total Invitation</td>
              <td>{{ $rsvp->total_invitation }}</td>
            </tr>

            <tr>
              <td>Email</td>
              <td>{{ $rsvp->email }}</td>
            </tr>

            <tr>
              <td>Phone</td>
              <td>{{ $rsvp->phone }}</td>
            </tr>
          @endslot
        @endcomponent
      </div>
      <p>Thank you for your reservation, please keep this information</p>
    </div>
  </div>
</div>
</body>
</html>