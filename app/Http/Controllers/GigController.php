<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class GigController extends Controller
{
    public function getCategories()

    {
        $categories = Category::all();
        return view('seller.pages.create-gig', compact('categories'));
    }
}
