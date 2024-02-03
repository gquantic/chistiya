<?php

namespace App\Http\Controllers\Catalogue;

use App\Http\Controllers\Controller;
use App\Models\Catalogue\Category;
use App\Models\Catalogue\Product;
use App\Repositories\Catalogue\CategoryRepository;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Manager;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('catalogue.categories.index', [
            'categories' => $this->categoryRepository->all(),
            'products' => Product::all(),
            'contacts' => Contact::all(),
            'managers' => Manager::all(),
        ]);
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
    public function show(Category $category)
    {
        return view('catalogue.categories.show', [
            'categories' => $this->categoryRepository->all(),
            'products' => Product::all(),
            'category' => $category,
            'contacts' => Contact::all(),
            'managers' => Manager::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
