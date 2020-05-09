<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 

        $parentCatsIds = [];
        for ( $i = 1; $i <= 5; $i++ )
        {   
            $parentId = DB::table('categories')->insertGetId([
                'name' => 'parent_cat',
                'slug' => 'parent-cat',
            ]); 
            array_push($parentCatsIds, $parentId);
        }

        
        $subCatsIds = [];
        foreach ($parentCatsIds as $parentId) 
        {
            $subCatId = DB::table('categories')->insertGetId([
                'name' => 'sub_cat_' . $parentId,
                'parent_cat_id' => $parentId,
                'slug' => 'sub-cat-cat-' . $parentId,
            ]); 
            array_push($subCatsIds, $subCatId);
        }
       
    
        foreach ($subCatsIds as $subCatId) 
        { 
            DB::table('categories')->insertGetId([
                'name' => 'nested_sub_cat_' . $subCatId,
                'parent_cat_id' => $subCatId,
                'slug' => 'nested-sub-cat-' . $subCatId
            ]); 
        }
    
    }
}
