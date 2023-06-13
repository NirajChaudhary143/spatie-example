@extends('admin.index')


@section('content')


<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Role ID</th>
      <th scope="col">Role</th>
      @role('admin')
      <th scope="col">Action</th>
      @endrole
    </tr>
  </thead>
  <tbody>
    @foreach($roles as $role)
    <tr>
    
      <td>{{$role->id}}</td>
      <td>{{$role->name}}</td>
      @role('admin')
      <td>
            <a class="btn btn-danger" href="{{ route('admin.deleteRole',['id' => $role->id]) }}">Delete</a>
            <a class="btn btn-primary" href="{{ route('admin.editRole',['id' => $role->id]) }}">Edit</a>
      </td>
      @endrole
    </tr>
    @endforeach
  </tbody>
</table>


@endsection