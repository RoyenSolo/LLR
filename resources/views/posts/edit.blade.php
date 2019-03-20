@extends('main')

@section('title', '| Edit Post')

@section('stylesheets')

  {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
  <div class="row">
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT',
    'data-parsley-validate' => '']) !!}
    <div class="col-md-8">
      <h1>Edit Post</h1>
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', null, array('class' => 'form-control input-lg', 'required' => '', 'maxlength' => '190')) }}

      {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
      {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '190', 'minlength' => '5']) }}

      {{ Form::label('category_id', 'Categories:', ['class' => 'form-spacing-top']) }}
      {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

      {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
      {{ Form::select('tags[]', $tags, null, ['class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple']) }}

      {{ Form::label('body', 'Post Body:', ['class' => 'form-spacing-top']) }}
      {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}
    </div>

    <div class="col-md-4">
      <div class="well">

        <dl class="dl-horizontal">
          <dt>Created at:</dt>
          <dd>{{ date('d M Y H:i',strtotime($post->created_at)) }}</dd>
        </dl>

        <dl class="dl-horizontal">
          <dt>Updated at:</dt>
          <dd>{{ $post->updated_at }}</dd>
        </dl>

        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.show', 'Cancel', [$post->id], ['class' => 'btn btn-danger btn-block']) !!}
          </div>

          <div class="col-sm-6">
            {{ Form::submit('Save changes', ['class' => 'btn btn-success btn-block']) }}
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
@endsection

@section('scripts')

  {!! Html::style('js/parsley.min.js') !!}
  <script type="text/javascript">
    $('.js-example-basic-multiple').select2();
  </script>

@endsection
