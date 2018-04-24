<table class="table table-responsive table-bordered">
    <thead>
        {{ $tableHeader or null }}
    </thead>

    <tbody>
        {{ $tableBody }}

        {{ $slot }}
    </tbody>

</table>