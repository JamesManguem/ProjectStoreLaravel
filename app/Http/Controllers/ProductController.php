<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['products']=Product::paginate(5);
        return view('product.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Name'=>'required|string|max:100',
            'Description'=>'required|string|max:100',
            'Price'=>'required|string|max:100',
            'Picture'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'The  :attribute is required ',
            'Picture.required'=>'The picture is required'
        ];

        $this->validate($request, $campos, $mensaje);




        //$dataProduct = request()->all();

        $dataProduct = request()->except('_token');

        if($request->hasFile('Picture')){
            $dataProduct['Picture']=$request->file('Picture')->store('uploads','public');
        }

        Product::insert($dataProduct);

        //return response()->json($dataProduct);
        return redirect('product')->with('message', 'Product added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product=Product::findOrFail($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'Name'=>'required|string|max:100',
            'Description'=>'required|string|max:100',
            'Price'=>'required|string|max:100',
            'Picture'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'The  :attribute is required ',
            'Picture.required'=>'The picture is required'
        ];


        if($request->hasFile('Picture')){
           $campos=['Picture'=>'required|max:10000|mimes:jpeg,png,jpg'];
           $mensaje=['Foto.required'=>'The picture is required'];
        }

        $this->validate($request, $campos, $mensaje);




        //
        $dataProduct = request()->except(['_token','_method']);

        if ($request->hasFile('Picture')){

            $product=Product::findOrFail($id);
            Storage::delete('public/'.$product->Picture);
            $dataProduct['Picture']=$request->file('Picture')->store('uploads','public');
        }




        Product::where('id','=',$id)->update($dataProduct);
        $product=Product::findOrFail($id);
        //return view('product.edit', compact('product'));

        return redirect('product')->with('mensaje','Modified Product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $product=Product::findOrFail($id);

        if(Storage::delete('public/'.$product->Picture)){
            Product::destroy($id);
        }




        return redirect('product')->with('message','Removed Product');


    }
}
