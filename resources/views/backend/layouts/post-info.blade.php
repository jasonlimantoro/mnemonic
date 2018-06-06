<div class="info">
    by {{ $post->user->name }} on {{ $post->created_at->toFormattedDateString() }} <br>
    Last updated: {{ $post->updated_at->diffForHumans() }}
</div>