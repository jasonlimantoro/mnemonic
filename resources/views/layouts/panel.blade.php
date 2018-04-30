<div class="panel panel-default">
  <div class="panel-heading">
    {{ $backButton or null }}
    <h1 class="title">{{ $title }}
      {{ $addButton or null  }}
    </h1>
  </div>

  <div class="panel-body">
		<div id="Search" class="__react-root"></div>
    {{ $body }}
  </div>

  {{ $slot }}
</div>
