<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;

class ProductController extends Controller
{
    public function fakeStoreApier()
    {
        $itoms = Http::get("https://fakestoreapi.com/products");
        //    return $itoms;
        // dd($itoms);
        return view('products', [
            "itoms" => json_decode($itoms)
        ]);
    }
    
    public function detail(Request $request){
        $itoms = Http::get("https://fakestoreapi.com/products/" . $request->id );
        return view('productdetails',["itoms"=> json_decode($itoms)]) ;
    }

    public function review(Request $request)
    {

        try {
            // $finalData = $request->validate([

            //     'review' => ['required', 'min:3'],
            //     'product_id'
            // ]);
          
          $finalData['review'] =  json_encode($request->review);
            $finalData['user_id'] = auth()->id();
            $finalData['product_id'] =  $request->id;
            Review::create($finalData);
            return 'review successfully submitted' ;
        } catch (\Throwable $th) {
            throw $th;
        }
       
    }
    
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    
    
    public function searcher(Request $request)
    { 
        $search = $request['search'] ?? "";
        if($search != ""){
         
         
            //dd($request->search);
            $yyy = Product::where('name' ,'like','%'. $request->search . '%')->get();
          foreach ($yyy as $yy ) {
           $zzz= Http::get("https://fakestoreapi.com/products/" . $yy->id);
          }
          dump($zzz);
           // $zzz = Product::find();
            return view('search', ['yyy' => $yyy]);
            
        }else{
          
            return "you searched nothing";
        
        }
        
     // dd($itoms);
        return view('search',['sorry, something bad happened']);
        // return view('search', compact('products'));
    }



    
    public function cart()
    {
        return view('cart');
    }
    
    public function addToCart($id)
    {
        $itoms = Http::get("https://fakestoreapi.com/products/" . $id);
    //    dd($itoms['title']);
       

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $itoms['title'],
                "image" => $itoms['image'],
                "price" => $itoms['price'],
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

 

    public function shipping(){
        return view('shipping');
    }
}