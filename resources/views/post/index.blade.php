@extends('layout.app')
@section('content')
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">author</th>
      <th scope="col">title</th>
      <th scope="col">content</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $d)
      <tr>
        <th>{{$d['id']}}</th>
        <td>{{$d['author']}}</td>
        <td>{{$d['title']}}</td>
        <td>{{$d['content']}}</td>
        <td>
          <a href="{{route('edit', $d['id'])}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
          <a href="{{route('destroy', $d['id'])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
        </td>
      </tr>
    @endforeach
    
  </tbody>
</table>
@endsection