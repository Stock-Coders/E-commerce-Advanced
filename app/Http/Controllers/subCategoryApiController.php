<?php

namespace App\Http\Controllers\dashboard;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryApiController extends Controller
{
    // Get All SubCategory Api
        public function getSubCategory(){
            $subCategory = SubCategory::all();
            return response()->json($subCategory);
        }
    // Save New subCategory Api
        public function storeSubCategory(Request $request){
            $request->validate([
                'title'       => 'required|string|unique:sub_categories,title|max:255',
                'description' => 'nullable|string|max:1020',
            ]);
            $subCategory = SubCategory::create($request->all());
            return response()->json($subCategory);
        }
            public function updateSubCategory(Request $request , $id){
                $subCategory = SubCategory::find($id);
                $subCategory->update($request->all());
                return response()->json($subCategory);
            }
    //delete SubCategory
            public function deleteSubCategory($id){
                $deleteSubCategory = SubCategory::destroy($id);
                return response()->json($deleteSubCategory);
            }
        }
