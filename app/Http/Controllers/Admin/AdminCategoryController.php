<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories', [
            'categories' => Category::orderBy('title')->paginate(5),
        ]);
    }

    public function create()
    {
        return view('admin.newCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(CategoryFormRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        return view('admin.newCategory', [
            'category' => Category::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryFormRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public
    function update(CategoryFormRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}
