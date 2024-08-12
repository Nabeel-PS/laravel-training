@extends('layouts.master');
    @section('title','New User')
    @section('content')
    <div class="container">
            <form action="{{ route('update.user') }}" method="post">
                @csrf   

                <input type="hidden" name="id" value="{{encrypt($user->id)}}">
        <div class="form-group">
            <label >NAME</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" aria-describedby="emailHelp" placeholder="Enter name">
            
        </div>
        <P></P>
        <div class="form-group">
            <label >email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control"  placeholder="email">
        </div>
        <P></P>
        <div class="form-group">
            <label >date of birth</label>
            <input type="text" name="dateofbirth" value="{{ $user->dateofbirth }}" class="form-control"  placeholder="dob">
        </div>
        <P></P>
        <div class="form-group">
            <label >status</label>
            <select class="form-control" name="status">
                <option value="1" @if ($user->status ==1) selected="selected" @endif>active</option>
                <option value="0" @if ($user->status ==0) selected="selected" @endif>inactive</option>
            </select>
        </div>
<P></P>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    
    @endsection