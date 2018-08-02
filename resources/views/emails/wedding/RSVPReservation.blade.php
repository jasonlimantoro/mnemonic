<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Document</title>
</head>
<style>
  html, body {
    min-height: 100vh;
    background-color: #fcfbe8;
  }

  .full-height {
    min-height: 100vh;
  }
  h1, p {
    text-align: center;
  }

</style>
<body>
<div class="container">
  <div class="row justify-content-center align-items-center full-height">
    <div class="col">
      <h1>The Wedding of {{ strtok($groom->name, " ") }} and {{ strtok($bride->name, " ") }}</h1>
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

        <p>Thank you for your reservation, please keep this information.</p>
      </div>
    </div>
  </div>
</div>
</body>
</html>