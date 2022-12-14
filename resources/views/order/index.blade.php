@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>

                <div class="card ">
                    <div class="card-header"> <span>Order</span>
                    <div>
                        <a class="link" href="{{ route('pizza.index') }}">View Pizza</a>
                        <a class="link" href="{{ route('pizza.create') }}">Create Pizza</a>
                    </div>
                </div>

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
                                    <th scope="col">Accept</th>
                                    <th scope="col">Reject</th>
                                    <th scope="col">Complete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->user->name }}</td>
                                        <td >{{ $order->user->email }}<br>{{$order->phone}}</td>
                                        <td>{{ $order->date }}/{{ $order->time }}</td>
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
                                        <form action="{{ route('order.status',$order->id) }}" method="post">@csrf
                                            <td>
                                                <input name="status" type="submit" value="accepted"
                                                    class="btn btn-primary btn-sm">
                                            </td>
                                            <td>
                                                <input name="status" type="submit" value="rejected"
                                                    class="btn btn-danger btn-sm">
                                            </td>
                                            <td>
                                                <input name="status" type="submit" value="completed"
                                                    class="btn btn-success btn-sm">
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    .link{
        color: whitesmoke;
        text-decoration: none; 
    }
    .link:hover{
        color:rgba(245, 245, 245, 0.572);
    }
</style>
@endsection
