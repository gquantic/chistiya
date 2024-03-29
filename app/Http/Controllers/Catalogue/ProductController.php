<?php

namespace App\Http\Controllers\Catalogue;

use App\Http\Controllers\Controller;
use App\Models\Catalogue\Product;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Manager;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $contacts = Contact::all();
        $managers = Manager::all();

        // Добавляем другие объемы
        $variants = Product::query()
            ->where('title', $product->title)
//            ->where(function ($query) use ($product) {
//                $query->where('volume_text', '!=', $product->volume_text)
//                    ->where('volume', '!=', $product->volume);
//            })
            ->get();

        return view('catalogue.products.show', compact('product', 'contacts', 'managers', 'variants'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
