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
      //Get ALL Delete Category Api
      public Function getDeletedCategories(){
        $AllDeleteCategories = Category::onlyTrashed()->get();
        return response()->json($AllDeleteCategories);
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
        $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string|max:1020',
        ]);
        $category = Category::find($id);
        $category->update($request->all());
        return response()->json($category) ;
    }

    //Function Delete Category

    public function deleteCategory($id){
        $deleteCategory = Category::destroy($id);
        return response()->json($deleteCategory);
        }

            //Restore Category Api
            public function restoreCategory($id){
                $restoreCategory = Category::withTrashed()->find($id);
                $restoreCategory->restore();
                $restoreCategory->update_at = null;
                $restoreCategory->save();
                return response()->json($restoreCategory);
            }

        //ForceDelete Category Api
            public function forceDeleteCategory($id){
                $forceDeleteCategory = Category::where('id' , $id)->whereNotNull('deleted_at');
                if($forceDeleteCategory){
                    $forceDeleteCategory->forceDelete();
                    return response()->json($forceDeleteCategory);
                }
                else{
                    return response()->json();
                }
            }
}
