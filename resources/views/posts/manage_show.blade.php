{{-- @extends('layouts.default') --}}
@extends('posts.show')
{{-- @section('title', "$post->title")

@section('content') --}}



{{-- <h1> --}}

@section ('edit')
<a href="{{ action('PostsController@edit', $post) }}" class="edit">[Edit]</a>
@endsection

@section('back')
<a href="{{ url('/manage') }}" class="header-menu">Top</a>
@endsection

@section('link')
<a href="{{ action('PostsController@show',$post) }}" class="show">{{ $post->title }}</a>
@endsection


@section ('delete')
{{-- @parent --}}
@forelse ($post->Comments as $Comment)
<li>
  {{ $Comment->body }}

  <a href="#" class="del" data-id="{{ $Comment->id }}">[x]</a>
  <form method="post" action="{{ action('CommentsController@destroy', [$post, $Comment]) }}"
    id="form_{{ $Comment->id }}">
    {{ csrf_field() }}
    {{ method_field('delete') }}
  </form>
</li>
@empty
{{-- <li>No Comments yet</li> --}}
@endforelse
@endsection

{{-- 
</ul>

<form method="post" action="{{  action('CommentsController@store', $post)  }}">
{{ csrf_field() }}
<p>
  <input type="text" name="body" placeholder="enter Comment" value="{{ old('body') }}">
  @if ($errors->has('body'))
  <span class="error">{{ $errors->first('body') }}</span>
  @endif
</p>
<p>
  <input type="submit" value="Add Comment">
</p>
</form>
<script src="/js/main.js"></script>
@endsection --}}



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