@extends('layout.main')
@push('title') <title>Home</title> @endpush
@section('main-section')
<h1 class="text-dark text-center mt-4">Products</h1>
<div class="container-fluid  row justify-content-center mb-5 mt-5">
    <p>Name : {{$sdata->name}}</p>
    <p>Email : {{$sdata->email}}</p>
    <a href="logout" >Logout</a>

    <table class="table">
        <thead class="table-dark ">
            <tr>
                <th class="col-2 text-center">Product</th>
                <th class="col-4 "><span class="ms-10">Description</span></th>
                <th class="col-4 "><span class="ms-10">Action</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $p)
            <tr>
                <td class="col-2">
                    <img src="{{$p->p_image}}" height="250" width="250" class="card-img-top " alt="...">
                </td>
                <td class="col-4 position-relative  ">
                    <table class="position-absolute top-30 fs-3 ms-5">
                        <tr>
                            <td>ID : {{$p->p_id}}</td>
                        </tr>
                        <tr>
                            <td>Name : {{$p->p_name}}</td>
                        </tr>
                        <tr>
                            <td>Price : {{$p->p_price}}</td>
                        </tr>
                    </table>
                </td>
                <td class="col-4">
                    <table class="m-5">
                        <tr>
                            <td>
                                <a href="{{url('update',['id' => $p ->p_id])}}">
                                    <button class="btn btn-outline-dark mb-5 fs-5 ps-5 pe-5">Update</button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{url('delete',['id' => $p ->p_id])}}">
                                    <button class="btn btn-outline-dark fs-5 ps-5 pe-5">Delete</button>
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
