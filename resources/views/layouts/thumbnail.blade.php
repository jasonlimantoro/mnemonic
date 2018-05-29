<div class="thumbnail {{ $class ?? '' }}">
    {{ $thumbnailImage }}
    <div class="caption">
        {{ $thumbnailCaption }}
    </div>
    {{ $slot }}
</div>