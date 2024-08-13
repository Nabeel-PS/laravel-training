@extends('layouts.master');
    @section('title','New User')
    @section('content')
    <div class="container">
<ul>
    <li>Name : {{ $user->name }} </li>
    <li>Email : {{ $user->email }} </li>
    <li>dob : {{ $user->dateofbirth }} </li>
    <li>status : {{ $user->status_text }} </li>
 
</ul>

    <hr>

    <ul>
    <li>address line 1 : {{ $user->address->address_line_1 }} </li>
    <li>city : {{ $user->address->city }} </li>
    <li>state {{ $user->address->state }} </li>
    <li>post code {{ $user->address->post_code }} </li>
    </ul>

    <hr>
<h5>orders</h5>
<table class="table">
    <thead>
        <tr>
            <td>order id</td>
            <td>price</td>
            <td>status</td>
            <td>placed at</td>
        </tr>
    </thead>
    <tbody>

        @foreach ($user->orders as $order)
        
       
<tr>
    <td>{{$order->order_id}}</td>
    <td>{{number_format($order->price,2)}}</td>
    <td>{{$order->status_text}}</td>
    <td>{{$order->created_at}}</td>
</tr>

@endforeach

    </tbody>
</table>
    </div>
    
       @endsection
  

 