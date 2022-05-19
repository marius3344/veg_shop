@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Orders') }}
                    <a class="btn btn-primary" href="{{ route('order.create') }}">Create new order</a>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order id</th>
                                <th>Products</th>
                                <th>Order amount</th>
                                <th>Order created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                   @foreach($order->products as $product) 
                                    {{ $product->name }}, 
                                    @endforeach
                                </td>
                                <td>{{ $order->order_amount }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
