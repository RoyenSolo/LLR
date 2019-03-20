@extends('main')

@section('title', '| Contact')

@section('content')
      <div class="row">
        <div class="col-md-12">
          <h1>CONTACT ME</h1>
          <hr>
          <form>
            <div class="form-group">
              <label name="email">Email:</label>
              <input id="email" type="text" name="email" class="form-control">
            </div>

            <div class="form-group">
              <label name="subject">Subject:</label>
              <input id="subject" type="text" name="subject" class="form-control">
            </div>

            <div class="form-group">
              <label name="message">Message:</label>
              <textarea name="message" class="form-control" rows="8" cols="80">Type message here...</textarea>
            </div>

            <input type="submit" value="Send message" class="btn btn-success">
          </form>
        </div>
      </div>
@endsection
