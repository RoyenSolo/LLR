@extends('main')

@section('title', '| View Post')

@section('content')

  <div class="row">

    <div class="col-md-8">
      <h1 class="lead">{{ $post->title }}</h1>
      <p class="input-lg"> {{ $post->body }}</p>
      <hr>
      <div class="tags">
        @foreach ($post->tags as $tag)
          <span class="label label-default">{{ $tag->name }}</span>
        @endforeach
      </div>
    </div>

    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <label>Url:</label>
          <p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
        </dl>

        <dl class="dl-horizontal">
          <label>Category:</label>
          <p>{{ $post->category->name }}</p>
        </dl>

        <dl class="dl-horizontal">
          <label>Created at:</label>
          <p>{{ date('d M Y H:i',strtotime($post->created_at)) }}</p>
        </dl>

        <dl class="dl-horizontal">
          <label>Updated at:</label>
          <p>{{ $post->updated_at }}</p>
        </dl>
        <hr>

        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-primary btn-block']) !!}
          </div>
          <div class="col-sm-6">
            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            {!! Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
