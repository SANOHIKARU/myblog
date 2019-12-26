@extends('layouts.default')

{{--
↑Bladeのコメントアウト↓

@section('title')
Blog Posts
@endsection

--}}

@section('title', 'さのひかるのメモ帳')

@section('content')
<div class="container">
  <h1>
    {{-- Blog Posts --}}
    さのひかるのメモ帳です


    <a href="{{ url('https://github.com/SANOHIKARU/myblog/issues') }}" class="header-menu" title="githubのissuesです" style="margin: auto 3px;" target="_blank">|改築予定|</a>

    <a href="{{ url('http://sanosu-myblog.herokuapp.com/posts/14') }}" class="header-menu" title="手抜きですが、フィードバックフォームになります" style="margin: auto 3px;" >|フィードバック|</a>

    
  </h1>
  <ul style="list-style: none;">
    {{-- <ul> --}}



    @forelse ($posts as $post)
    <li>
      {{ $post->good }}
      {{-- ← --}}
      {{-- <button class="btn" type="button"> --}}
      <a href="{{ action('PostsController@increaseGood', $post) }}" class="btn btn-primary btn-sm">👍</a>
      {{-- </button> --}}

      <a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a>

    </li>

    @empty
    <li>No posts yet</li>
    @endforelse

  </ul>
  <script src="/js/main.js"></script>

  @endsection