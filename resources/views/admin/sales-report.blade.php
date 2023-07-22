@extends('layouts.admin')

@section('content')

<style>
    .card-body .text {
        font-size: 15px;
        margin-left: 10px;
        margin-bottom: 5px;
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-header" style="">
            <h2 class="card-title" style="font-size: 25px; margin-left:400px;">Sales Report</h2>
        </div>
        <div class="card-body">
            <h5 style="">Total Revenue</h5>
            <p class="text">Daily: Rp.  {{number_format($totalRevenue['daily'], 0, ',', '.')}} </p>
            <p class="text">Weekly: Rp.{{number_format($totalRevenue['weekly'], 0, ',', '.')}} </p>
            <p class="text">Monthly: Rp. {{ number_format($totalRevenue['monthly'] , 0, ',', '.')}}</p>
            <p class="text">Yearly: Rp.{{number_format($totalRevenue['yearly'], 0, ',', '.')  }}</p>

            <h5 style="margin-top: 25px;">Most Sold Products</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Sales</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productSales as $productId => $data)
                      
                            <td>{{ $data['name'] }}</td>
                            <td>{{ $data['quantity'] }}</td>
                            <td>Rp. {{ number_format($data['total_sales'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h5 style="margin-top: 25px;">Unsold Products</h5>
            @if($unsoldProducts->isEmpty())
                <p>All products have been sold at least once.</p>
            @else
                <ul>
                    @foreach($unsoldProducts as $product)
                        <li>{{ $product->name }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection
