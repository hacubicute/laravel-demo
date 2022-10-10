
@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <input type="hidden" id="product_id" value="{{ $product->id}}">
    <h1>Name: {{ $product->name }}</h1>
    <h1>Type: &nbsp;&nbsp;{{ $product->type }}</h1>
    <h1>Stock: &nbsp;{{ $product->stock }}</h1>
    <h1>Price: &nbsp;&nbsp;{{ $product->price }}</h1>

    <button class="btn btn-success" id="btncart">Add to Cart</button>


    

 </div>



@endsection 

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$( "#btncart" ).click(function() {

    var email = $('#email').val();
      var password = $('#password').val();
      $.ajax({
        type:'POST',
        url: '/products/ajax/add_to_cart',
        dataType:"json",
        data:{
            product_id: $('#product_id').val(),
            _token: CSRF_TOKEN,
        },
        success:function(data)
        {

            console.log(data);

            Swal.fire({
              icon: data.icon,
              title: "ADD TO CART",
              html: data.message,
              });

 
         
        }
    });
   
});


</script>

@endsection 

