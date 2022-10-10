
@extends('layouts.app')

@section('content')
<div class="container mt-5">
             <div class="row">
             <?php 
             $counter=0; 
             ?>  
                    @foreach($products as $product)
                 
                        <div class="col-md-4 mt-5">

                            <div class="card" style="width: 23rem;">
                            <img src="https://picsum.photos/200/300?random={{$counter}}" style="height:200px;" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h1 class="card-title">{{ $product->name }}</h1>
                                <h3 class="card-title">{{ $product->type }}</h3>
                                <p class="card-text">Stock: {{ $product->stock }} - $ {{ $product->price }}</p>
                                <a href="/product/{{$product->id}}" class="btn btn-primary">View Details</a>
                            </div>
                            </div>
                  
                        </div>
                        <?php 
                        $counter++; 
                        ?>
                    @endforeach
             </div>
        
            <div class="d-flex">
                {!! $products->links() !!}
            </div>
    </div>



@endsection 

@section('scripts')
<script>
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


</script>

@endsection 

