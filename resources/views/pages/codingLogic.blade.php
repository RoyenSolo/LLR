@extends('main')

@section('title', '|Coding Logic')

@section('content')

@php
  if (is_array($postTagArray)) {
    foreach ($postTagArray as $postTag) {
      echo $postTag . "<br />";
    }
  }
  else {
    echo $postTagArray;
  }
@endphp


@endsection
