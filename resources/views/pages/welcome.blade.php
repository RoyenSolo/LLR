@extends('main')

@section('title', '| Home')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                  <h1>Hello, world!</h1>
                  <p class="lead">Thank you for visiting</p>
                  <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular post</a></p>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-8" style="color:blue">

              @foreach ($posts as $post)
              <div class="post">
                <h3 class="input-lg">{{ $post->title }}</h3>
                <p>{{ substr($post->body, 0, 350) }} {{strlen($post->body) > 150 ? "..." : "" }}
                </p>
                <a href="{{url('blog/' . $post->slug) }}" class="btn btn-primary">READ MORE</a>
              </div>
              <hr />
            @endforeach

          </div>

          <div class="col-md-3 col-md-offset-1" style="color:red">
              <h2>SIDEBAR</h2>
          </div>
        </div>
@endsection
