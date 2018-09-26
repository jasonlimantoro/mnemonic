<ul>
  @foreach($homePosts as $homePost)
    <li>
      <a href="{{ subdomainRoute('front.posts.read', ['post' => $homePost->id ]) }}">
        {{ $homePost->title }}
      </a>
    </li>
  @endforeach
</ul>
<div class="post-pagination">
  {{ $homePosts->links() }}
</div>
