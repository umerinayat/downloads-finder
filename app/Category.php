<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    private $nestedCategories = [];

    // mass assignable fields
    protected $fillable = [
        'name', 'parent_cat_id', 'slug'
    ];

    // store category
    public static function storeCategory( $input )
    {  
        $category = Category::create($input);
        return $category;
    }

    // update category
    public static function updateCategory ($input, $category)
    {   
        $category->update($input);
        return $category; 
    }

    // get all categories
    public static function getAll () 
    {
        return category::all();
    }

    // get all parent categories
    public static function getParentCategories () 
    {
        return category::where('parent_cat_id', NULL)->get();
    }

    // get all sub categories
    public static function getSubCategories ($category) 
    {       
        return Category::where('parent_cat_id', $category->id)->get();
    }

     // get all sub nestd structure categories
     public function getNestedStructSubCategories ($category) 
     {       
        $parentCategories = Category::where('parent_cat_id', $category->id)->get();
        
        foreach ( $parentCategories as $parentCat ) 
        {   
            $this->getNestedCategories($parentCat);

            array_push($this->nestedCategories, $parentCat);
        }
        return $this->nestedCategories;
    
    }

    // get all nested Structure Categories 
    public function getNestedStructureCategories () 
    {   
        
        $parentCategories = category::where('parent_cat_id', NULL)->get();

        foreach ( $parentCategories as $parentCat ) 
        {   
            $this->getNestedCategories($parentCat);

            array_push($this->nestedCategories, $parentCat);
        }
        return $this->nestedCategories;
    }

    private function getNestedCategories ( $parentCat )
    {
        $parentCat->subCats = Category::where('parent_cat_id', $parentCat->id)->get();  
        foreach ( $parentCat->subCats as $parentCat ) 
        {   
            $this->getNestedCategories($parentCat);
        }

        return;
    }


}
