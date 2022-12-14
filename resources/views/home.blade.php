@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">Your Order</div>

                <div class="card-body">
                   <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Phone/Email</th>
                                <th scope="col">Date/Time</th>
                                <th scope="col">Pizza</th>
                                <th scope="col">Small pizza</th>
                                <th scope="col">Medium pizza</th>
                                <th scope="col">Large pizza</th>
                                <th scope="col">Total($)</th>
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th>{{ $order->id }}</th>
                                        <td>{{ $order->phone }} / {{ $order->user->email }}</td>
                                        <td>{{ $order->date }} / {{ $order->time }}</td>
                                         <td>{{ !empty( $order->pizza) ? $order->pizza->name : '' }}</td>
                                        <td>{{ $order->small_pizza }}</td>
                                        <td>{{ $order->medium_pizza }}</td>
                                        <td>{{ $order->large_pizza }}</td>
                                        <td>${{ (!empty( $order->pizza) ? $order->pizza->small_pizza_price * $order->small_pizza : 0)+
                                            (!empty( $order->pizza) ? $order->pizza->medium_pizza_price * $order->medium_pizza : 0)+
                                            (!empty( $order->pizza) ? $order->pizza->large_pizza_price * $order->large_pizza : 0)
                                            }}</td>
                                        <td>{{ $order->body }}</td>
                                        <td>{{ $order->status }}</td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a.list-group-item{
        font-size: 18px
    }
    a.list-group-item:hover{
      background-color: rgb(177, 30, 30);
      color: #fff;
    }
    .card-header{
        background-color: rgb(177, 30, 30);
        color: #fff;
        font-size: 20px;
    }
</style>
@endsection