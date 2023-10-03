<?php

namespace App\Http\Controllers\dashboard\ApiControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class SubCategoryApiController extends Controller
{
    // Get All SubCategories Api
        public function getSubCategories(){
            $subCategory = SubCategory::with('create_user')->with('update_user')
            ->with('category')->get();
            return response()->json($subCategory);
        }
        //Get ALL Delete Category Api
        public Function getDeletedsubCategories(){
        $AllDeleteSubCategories = SubCategory::onlyTrashed()->get();
        return response()->json($AllDeleteSubCategories);
    }
    // Save New subCategory Api
    public function storeSubCategory(Request $request){
            $request->validate([
                'title'       => 'required|string|unique:sub_categories,title|max:255',
                'description' => 'nullable|string|max:1020',
                'category_id' => 'required|exists:categories,id',
            ]);
            $subCategory = SubCategory::create($request->all());
            return response()->json($subCategory);
        }
            public function updateSubCategory(Request $request , $id){
                $request->validate([
                    'title'       => 'required|string|unique:sub_categories,title|max:255',
                    'description' => 'nullable|string|max:1020',
                    'category_id' => 'required|exists:categories,id',
                ]);
                $subCategory = SubCategory::find($id);
                $subCategory->update($request->all());
                return response()->json($subCategory);
            }
    //delete SubCategory
            public function deleteSubCategory($id){
                $deleteSubCategory = SubCategory::destroy($id);
                return response()->json($deleteSubCategory);
            }
                        //Restore Category Api
                        public function restoreSubCategory($id){
                            $restoreSubCategory = SubCategory::withTrashed()->find($id);
                            $restoreSubCategory->restore();
                            $restoreSubCategory->update_at = null;
                            $restoreSubCategory->save();
                            return response()->json($restoreSubCategory);
                        }

                    //ForceDelete Category Api
                        public function forceDeleteSubCategory($id){
                            $forceDeleteSubCategory = SubCategory::where('id' , $id)->whereNotNull('deleted_at');
                            if($forceDeleteSubCategory){
                                $forceDeleteSubCategory->forceDelete();
                                return response()->json($forceDeleteSubCategory);
                            }
                            else{
                                return response()->json();
                            }
                        }
        }
