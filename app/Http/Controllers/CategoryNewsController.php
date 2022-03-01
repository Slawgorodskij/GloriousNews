<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
    public function category()
    {
        return view('category', [
            'list_categories' => Category::with('news')->orderBy('title')->get(),
        ]);
    }
}
