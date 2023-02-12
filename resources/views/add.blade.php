@extends('layout.main')
@push('title') <title>Add</title> @endpush
@section('main-section')
<h1 class="text-dark">Product Add</h1>

<form action="{{url('/')}}/add" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label class="form-label">Product Name :</label>
    <input type="text" class="form-control" name="pro_name">
  </div>
  <div class="mb-3">
    <label class="form-label">Product Price :</label>
    <input type="number" class="form-control" name="pro_price">
  </div>
  <div class="mb-3">
    <label class="form-label">Product Image :</label>
    <input type="file" class="form-control" id="image" name="pro_image">
  </div>

  <button type="submit" class="btn btn-dark">Add Product</button>
  <div id="preview">
  </div>
</form>
@endsection

@section('script')
<script type="text/javascript">
  // window.onload = function() {
  //   if (window.jQuery) {
  //     // jQuery is loaded  
  //     alert("Yeah!");
  //   } else {
  //     // jQuery is not loaded
  //     alert("Doesn't Work");
  //   }
  // }

    // function imagePreview(fileInput) {
    //   if (fileInput.files && fileInput.files[0]) {
    //     var fileReader = new FileReader();
    //     console.log("enter")
    //     fileReader.onload = function(event) {
    //       $('#preview').html('<img src="' + event.target.result + '" width="150px" height="150px"/>');
    //       console.log("set image")
    //     };
    //     fileReader.readAsDataURL(fileInput.files[0]);
    //     console.log("end")
    //   }
    // }
    // $("#image").change(function() {
    //   imagePreview(this);
    //   console.log("image fun")
    // });
</script>
@endsection