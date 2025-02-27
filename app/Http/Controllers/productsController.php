<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User ;



class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::select('select p.img as product_img , u.img as user_img, p.* , u.*  from products as p inner join users as u on u.user_id = p.oner_id') ;
        return view('products.home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        return view('products.createProduct' , compact('user'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $validateData = $request->validate([
            'img' => 'required|mimes:jpeg,jpg,png,gif' ,
            "price" => 'nullable|numeric' ,
            "title" => 'required|max:50|min:1' ,
            "description" => 'nullable|max:50|min:1' ,
        ]) ;

        $img = $request->file('img') ;
        $img_name = time(). '_' . $img->getClientOriginalName()  ;
        $img->move(public_path('img') , $img_name) ;

        Products::create([
            "oner_id" => Auth::user()->user_id ,
            "command_id" => null ,

            "img" => $img_name,
            "price" => $validateData['price'] ,
            "title" => $validateData['title'] ,
            "description" => $validateData['description'] ,
            "to_sell" => true ,
        ]);

        return redirect()->route('home')->with('success' , true) ;

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $product = Products::findOrFail($id);
        $artist = User::findOrFail($product->oner_id);
        
       return view('products.product', compact('product' , 'artist')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request ,string $id)
    {
        $route = $request->route ;
        $product = Products::findOrFail($id);

        $user = Auth::user() ;
        if($user){
            return view('products.updateProduct' , compact('product' , 'user'  , 'route')) ;
        }else{
            return redirect()->route('LoginFrom');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validateData = $request->validate([
            'img' => 'nullable|mimes:jpeg,jpg,png,gif' ,
            "price" => 'nullable|numeric' ,
            "title" => 'required|max:50|min:1' ,
            "description" => 'nullable|max:50|min:1' ,
        ]) ;


        $product = Products::findOrFail($id) ;
            
        if($request->hasFile('img')) {
            //why this block of code don't work even if i send the img file usin From
            $img = $request->file('img') ;
            $img_name = time(). '_' . $img->getClientOriginalName()  ;
            $img->move(public_path('img') , $img_name) ;
        }else{
            $img_name = $product->img ;
        };

        $product->img =  $img_name ;
        $product->title =  $validateData['title'] ;
        $product->price =  $validateData['price'] ;
        $product->description =  $validateData['description'] ;

        $product->save() ;
        // dd('gg' . $request->route) ;
        return redirect()->route($request->route , $id)->with('success' , true) ;


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $product = Products::findOrFail($id) ;
       $product->delete() ;
       return redirect()->route('product.purcheses')->with('deleted' , 'the project is deleted with success !') ;

   }
   
    public function purcheses()
    {
        $user = Auth::user() ;
        if($user){
            $products = Products::where('oner_id' , $user->user_id)->get() ;
            return view('products.purcheses' , compact('products')) ;
        }else{
            return redirect()->route('LoginFrom') ; 
        }
    }
}
