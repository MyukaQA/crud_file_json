@extends('layout.app')
@section('content')
<form action="{{route('update', $jsonfile['id'])}}" method="POST">
  {{ csrf_field() }}
  <div class="form-group d-none">
    <label for="exampleFormControlInput1">Id</label>
    <input value="{{$jsonfile['id']}}" name="id" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">author</label>
    <input value="{{$jsonfile['author']}}" name="author" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">title</label>
    <input value="{{$jsonfile['title']}}" name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">content</label>
    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$jsonfile['content']}}</textarea>
  </div>

  <button class="btn btn-warning" type="submit">Update</button>
</form>
@endsection