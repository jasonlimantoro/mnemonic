<table class="table table-bordered">
  <thead>
    {{ $tableHeader or null }}
  </thead>

  <tbody>
    {{ $tableBody }}

    {{ $slot }}
  </tbody>

</table>
