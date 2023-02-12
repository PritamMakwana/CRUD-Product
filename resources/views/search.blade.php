@extends('layout.main')
@push('title') <title>Search</title> @endpush
@section('main-section')
<h1 class="text-dark">Product Search</h1>
<form action="{{url('/')}}/searchPage" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Product Information :</label>
        @if($mess!=null)
        <input type="text" class="form-control" name="pro_info" value="{{$mess}}">
        @elseif($product==null)
        <input type="text" class="form-control" name="pro_info">
        @endif
    </div>
    <button type="submit" class="btn btn-dark mb-3">Search Product</button>
    @if($product==null)
    @if($mess!=null)
    <div class="mb-3">
        <label class="form-label text-danger">This Product is not available </label>
    </div>
    @endif
    @endif
</form>

@if($product!=null)
<h1 class="text-dark text-center mt-4">Products</h1>
<div class="container-fluid  row justify-content-center mb-5 mt-5">
    <table class="table">
        <thead class="table-dark ">
            <tr>
                <th class="col-2 text-center">Product</th>
                <th class="col-4 "><span class="ms-10">Description</span></th>
                <th class="col-4 "><span class="ms-10">Action</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $product)
            <tr>
                <td class="col-2">
                    <img src="{{asset($product->p_image)}}" height="250" width="250" class="card-img-top " alt="...">
                </td>
                <td class="col-4 position-relative  ">
                    <table class="position-absolute top-30 fs-3 ms-5">
                        <tr>
                            <td>ID : {{$product->p_id}}</td>
                        </tr>
                        <tr>
                            <td>Name : {{$product->p_name}}</td>
                        </tr>
                        <tr>
                            <td>Price : {{$product->p_price}}</td>
                        </tr>
                    </table>
                </td>
                <td class="col-4">
                    <table class="m-5">
                        <tr>
                            <td>
                                <a href="{{url('update',['id' => $product ->p_id])}}">
                                    <button class="btn btn-outline-dark mb-5 fs-5 ps-5 pe-5">Update</button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{url('delete',['id' => $product ->p_id])}}">
                                    <button class="btn btn-outline-dark fs-5 ps-5 pe-5">Delete</button>
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>



@endif

@endsection