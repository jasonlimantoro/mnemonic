<div class="row">
    <div class="col-md-12">
        @slot('tableHeader')
            <tr>
                <th class="col title">Title</th>
                <th class="col body">Body</th>
                <th class="col action">Action</th>
            </tr>
        @endslot

        @slot('tableBody')
            @foreach($posts as $post)
                @include('posts.backend.post')
            @endforeach
        @endslot

    </div>
</div>
