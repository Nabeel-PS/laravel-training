@extends('layouts.master');
    @section('title','New User')
    @section('content')
    <div class="container">
            <form action="{{ route('save.user') }}" method="post">
                @csrf   
        <div class="form-group">
            <label >NAME - {{session()->get('user_name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Enter name">
            @error('name') <p class="btn-danger">{{ $message }} </p>@enderror
        </div>
        <P></P>
        <div class="form-group">
            <label >email</label>
            <input type="email" name="email" class="form-control"  placeholder="email">
            @error('email') <p class="alert-danger">{{ $message }} </p>@enderror
        </div>
        <P></P>
        <div class="form-group">
            <label >date of birth</label>
            <input type="text" name="dateofbirth" class="form-control"  placeholder="dob">
        </div>
        <P></P>
        <div class="form-group">
            <label >status</label>
            <select class="form-control" name="status">
                <option value="1">active</option>
                <option value="0">inactive</option>
            </select>
        </div>
<P></P>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    
    @endsection