@foreach ($posts as $post)
<div>
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
    <a href="{{ route('posts.show', $post) }}">Xem chi tiết</a>
</div>
<hr>
@endforeach
