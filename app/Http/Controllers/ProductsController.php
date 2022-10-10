<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Http\Request;
use Auth;

class ProductsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        $products = Products::latest()->paginate(12);

        return view('products', compact('products'));
	  
    
    }

    public function single_product(Request $request , $id)
    {
        $product= Products::where('id' , $id)->first();

        return view('single_product', compact('product'));
	  
    
    }

    public function ajax($section , Request $request){
		switch ($section) {
			case 'add_to_cart':


                $get_product= Products::where('id' , $request->product_id)->first();

                $cart = Cart::create([
                    'product_id' => $request->product_id, 
                    'user_id' => Auth::user()->id, 
                    'qty' => '2',
                    'bill' => $get_product->price * 2,
                ]);

                if($cart)
                {
                    return response()->json([
                        'error' => false,
                        'icon' => "success",
                        'message' => 'Added to Cart',
                    ]);

                }

            

			break;

			case 'sample':
		
			break;
			
			default:
			break;
		}

	}
    
  

}




