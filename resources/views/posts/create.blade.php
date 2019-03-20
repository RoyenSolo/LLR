@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

  {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create New Post</h1>
      <hr>
      {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}

        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '190')) }}

        {{ Form::label('slug', 'Slug:') }}
        {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5',
        'maxlength' => '190']) }}

        {{ Form::label('category_id', 'Category:') }}
        <select class="form-control" name="category_id">
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>

        {{ Form::label('tags', 'Tags:') }}
        <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
          @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @endforeach
        </select>

        {{ Form::label('body', 'Post Body:') }}
        {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

        {{ Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px']) }}

      {!! Form::close() !!}
    </div>
  </div>
@endsection

@section('scripts')

  {!! Html::style('js/parsley.min.js') !!}

  <script type="text/javascript">
    $('.js-example-basic-multiple').select2();
  </script>

@endsection
