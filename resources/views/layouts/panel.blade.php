<div class="panel panel-default">
    <div class="panel-heading">
        {{ $backButton}}
        <h1 class="title">{{ $title }}
            {{ $addButton }}
        </h1>
    </div>

    <div class="panel-body">
        {{ $body }}
    </div>

    {{ $slot }}
</div>
