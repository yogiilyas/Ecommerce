@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Show Product</div>

                <div class="card-body">
                    <table class="table text-semibold">
                        <tbody>
                            <tr>
                                <td class="col-xs-2">Name</td>
                                <td class="col-xs-2">{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-2">Price</td>
                                <td class="col-xs-2">{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-2">Description</td>
                                <td class="col-xs-2">{{ $product->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group" style="margin-top:40px">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
