<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class IndexController extends Controller
{
    // index
    public function index ()
    {
        $data = [];

       //$data['categories'] = ($cat = new Category())->getNestedStructureCategories();
       $data['categories'] =  Category::getParentCategories();

        return view('blog.index', $data);
    }
}
