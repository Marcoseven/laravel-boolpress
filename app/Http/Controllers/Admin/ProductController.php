<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10); 
        return view ('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $products)
    {
        return view ('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'unique:products'],
            'slug' => ['nullable'],
            'availability' => ['nullable'],
            'quantity' => ['nullable'],
            'price' => ['nullable'],
            'description' => ['nullable'],
        ]);

        Product::create($validated);

        // Redirect
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if(Auth::id() === $product->id) { 
            return view('admin.products.edit', compact('product'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => [
                'required', 
                Rule::unique('products')->ignore($product->id), 'max:100',
            ],
            'slug' => ['nullable'],
            'availability' => ['nullable'],
            'quantity' => ['nullable'],
            'price' => ['nullable'],
            'description' => ['nullable'],
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $product->update($validated);

        // Redirect
        return redirect()->route('admin.products.index')->with('message', 'Prodotto aggiornato');
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
        if(Auth::id() === $product->user_id){
            $product->delete();
            return redirect()->route('admin.products.index')->with('message', 'Prodotto rimosso');
        } else{
            abort(403);
        }
    }
}
