@extends('layout.main')
@push('title') <title>Update</title> @endpush
@section('main-section')
<h1 class="text-dark">Product Update</h1>
<form action="{{url('/')}}/update/{{$data->p_id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Product Name :</label>
        <input type="text" class="form-control" name="pro_name" value="{{$data->p_name}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Product Price :</label>
        <input type="number" class="form-control" name="pro_price" value="{{$data->p_price}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Product Image :</label>
        <input type="file" class="form-control mb-4" id="image" name="pro_image">
        <img src="{{asset($data->p_image)}}" height="200" width="200" />
    </div>
    <button type="submit" class="btn btn-dark">Update Product</button>

</form>

@endsection