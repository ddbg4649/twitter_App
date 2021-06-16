//個別の詳細表示画面
@if (session('message'))
    {{ session('message') }}
@endif

{{ $post->title }}
{{ $post->content }}

<a href="/posts/{{ $post->id }}/edit">編集</a>
