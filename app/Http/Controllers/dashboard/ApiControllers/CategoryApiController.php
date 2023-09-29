<?php

namespace App\Http\Controllers\dashboard\ApiControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryApiController extends Controller
{
    //Category Api Controller
    //Get All Category
    public function getCategories(){
        $categories = Category::with('create_user')->with('update_user')->get();
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
