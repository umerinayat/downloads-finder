<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class categorizedPostsController extends Controller
{
    public function index (Category $category ) 
    {
        $data = [];

        $data['category'] = $category;
       
        //$data['categories'] = ($cat = new Category())->getNestedStructSubCategories($category);
        $data['categories'] = Category::getSubCategories($category);
        

        return view('blog.categories.posts.index', $data);
    }
}
