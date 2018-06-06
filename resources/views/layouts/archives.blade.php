<ul>
  @foreach($homePosts as $homePost)
    <li>
      <a href="{{ route('front.posts.read', ['post' => $homePost->id ]) }}">
        {{ $homePost->title }}
      </a>
    </li>
  @endforeach
</ul>
<div class="post-pagination">
  {{ $homePosts->links() }}
</div>
