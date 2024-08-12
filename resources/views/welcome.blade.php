    @extends('layouts.master')
    @section('pagetitle','homepage')
    @section('content')
    <h2>Users</h2>
    @if(session()->has('message'))<p>{{session()->get('message') }}</p> @endif
    <h2>{{ session()->get('date') }}</h2>
    <a href="{{route('create.user')}}" class="btn btn-success">new</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">status</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
   
        @foreach ($users as $user )
        <tr>
        <!-- <th scope="row">{{$loop->iteration}}</th> -->
        <th scope="row">{{$users->firstItem()+ $loop->index }}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email    }}</td>
      <td>@if ($user->trashed()) trashed   @else active @endif</td>
      <td>
        <a href="{{route ('edit.user', encrypt($user->id))}}" class="btn btn-primary">Edit</a>
        @if ($user->trashed())  <a href="{{route ('activate.user', encrypt($user->id))}}" class="btn btn-success">Activate</a> @endif
        <a href="{{route ('delete.user',encrypt($user->id))}}" class="btn btn-danger">Delete</a>
        <a href="{{route ('force.delete.user',encrypt($user->id))}}" class="btn btn-info">Force delete</a>
    </td>
    </tr>
        @endforeach
     
  
  </tbody>
</table>
<div>
  {{$users->links()}}
</div>


 

    @endsection
