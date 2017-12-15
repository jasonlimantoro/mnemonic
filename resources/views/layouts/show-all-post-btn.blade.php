@php

@endphp

<a href="{{ route('pages.show', ['page' => $page->id]) }}" class="btn btn-danger">
    <i class="fa fa-angle-left"></i>
    Show All Posts in <strong>{{ $page->title }} </strong>
</a>