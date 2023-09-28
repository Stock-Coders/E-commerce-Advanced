<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryApiController extends Controller
{
    //Category Api Controller
    //Get All Category
    public function getCategories(){
        $categories = Category::all();
        return response()->json($categories);
    }

    //Save New Category
    public function storeCategory(Request $request){
        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string|max:1020',
        ]);
        $category = Category::create($request->all());
        return response()->json($category);
    }
    //update Category
    public function updateCategory(Request $request , $id){
        $category = Category::find($id);
        $category->update($request->all());
        return response()->json($category) ;
    }

    //Function Delete Category

    public function deleteCategory($id){
        $deleteCategory = Category::destroy($id);
        return response()->json($deleteCategory);
       }

}
