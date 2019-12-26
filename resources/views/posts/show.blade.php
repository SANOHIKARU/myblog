@extends('layouts.default')

  @section('GoogleAnalytics')
  @parent {{-- GoogleAnalyticsを継承 --}}
  @endsection

@section('title', "$post->title - さのひかるのメモ帳 -")

@section('content')


<h1>

  @yield('edit') {{-- manageではeditへのリンク設置 --}}

  


  @section('top')
  <a href="{{ url('/') }}" class="header-menu">Top</a>
  @show

  {{ $post->good }}
  <a href="{{ action('PostsController@increaseGood', $post) }}" class="btn btn-primary btn-sm">👍</a>

  @section('link')
  {{ $post->title }}
  @show


</h1>
<p style="font-size: 10px; border-bottom: 1px solid #ddd;">作成日: {{ $post->created_at }}</p>


<p>{!! nl2br(e($post->body)) !!}</p>

<p>
  <a href="javascript:window.open('http://twitter.com/share?text='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');">
    <img src="{{ asset('/assets/Twitter.png') }}" alt="Twitter" width="20"  class="header-menu" title="Twitterで共有">
</a>
  {{-- <a href="{{ url('/') }}"><img src="{{ asset('/assets/Twitter.png') }}" alt="ロゴ" width="20"> --}}</p>

<h2>Comments</h2>
<ul>


  @section('delete')

  @forelse ($post->comments as $comment)
  <li>
    {{ $comment->body }}
    </form>
  </li>
  @empty
  {{-- <li>Nocommentsyet</li> --}}
  @endforelse
  @show

</ul>

<form method="post" action="{{  action('CommentsController@store', $post)  }}">
  {{ csrf_field() }}
  <p>
    <input type="text" name="body" placeholder="enter comment" value="{{ old('body') }}">
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="Add Comment">
  </p>
</form>
<script src="/js/main.js"></script>
@endsection



<!-- <!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>{{ $post->title }}</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
  <div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{!! nl2br(e($post->body)) !!}</p>
  </div>
</body>

</html> -->