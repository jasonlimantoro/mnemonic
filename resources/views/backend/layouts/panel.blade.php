<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="title">{{ $title }}
      {{ $addButton or null  }}
    </h2>
  </div>

  <div class="panel-body">
    {{ $body }}
  </div>

  {{ $slot }}
</div>
