<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* $products = Product::orderBy('id', 'DESC');

        if ($request->name !== null)
            $products = $products->where('name', 'LIKE', '%'.$request->name.'');
        if ($request->id !== null)
            $products = $products->where('id', $request->id);
        
        $products = $products->paginate(10); */

        $products = Product::orderBy('id', 'DESC')
            ->with('category')
            ->id($request->id)
            ->name($request->name)
            ->categoryName($request->category_name)
            ->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $pluckCategories = Category::pluck('name', 'id');
        //dd($categories, $plukCategories);
        return view('products.create', compact('categories', 'pluckCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        // its ok but could be better
        /* $request->validate([
            'name' => 'required | string | max:5',
            'status' => 'required | boolean',
            'quantity' => 'required | integer'
        ]); */

        /* $input = $request->all();
        $input['code'] = str_pad($input['code'], 6, "0", STR_PAD_LEFT); */

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');

        //return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        /* $product = Product::find($product);
        if(empty($product))
            return abort(404);
            //return redirect()->route('products.index')->with('error','Product not found.'); */

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
