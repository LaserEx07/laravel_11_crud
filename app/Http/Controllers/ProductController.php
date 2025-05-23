<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class ProductController extends Controller
{
    
    public function index() : View
    {
        return view('products.index', [
            'products' => Auth::user()->products()->latest()->paginate(4)
            ]);

    }

    
    public function create() : View
    {
        return view('products.create');
    }

    
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('products', 'public');
            $validated['picture'] = $picturePath;
        }

        Product::create($validated);
        return redirect()->route('products.index')
        ->withSuccess('New product is added successfully.');
    }


    
    public function show(Product $product): View
    {
        
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('products.show', compact('product'));

    }

    
    public function edit(Product $product): View
    {
       
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('products.edit', compact('product'));
    }

   
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validated();

        if ($request->hasFile('picture')) {
            
            if ($product->picture) {
                Storage::disk('public')->delete($product->picture);
            }

            $picturePath = $request->file('picture')->store('products', 'public');
            $validated['picture'] = $picturePath;
        }

        $product->update($validated);
        return redirect()->back()
        ->withSuccess('Product is updated successfully.');
    }
    
    public function destroy(Product $product): RedirectResponse
    {
       
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

       
        if ($product->picture) {
            Storage::disk('public')->delete($product->picture);
        }

        $product->delete();
        return redirect()->route('products.index')
        ->withSuccess('Product is deleted successfully.');
    }
}
