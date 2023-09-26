<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subCategories = subCategory::orderBy('id' , 'desc')->simplePaginate(4);
        return view('dashboard.pages.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.pages.sub-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'         =>'required|string|unique:subCategories,title|max:255',
           'description'    =>'nullable|syring|max:1020',
           'create_user_id' =>'nullable',
           'update_user_id' =>'nullable',
        ]);

        $subCategory   = new subCategory();
        $subCategory->title          = $request->title;
        $subCategory->description    = $request->description;
        $subCategory->create_user_id = auth()->user()->id;
        $subCategory->update_at      = null;
        $subCategory->save();

        return redirect()->route('subCategories.index')->with('Created_subCategory_successfully' , "the subCategory ($subCategory->title)has been Created Successfully.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $subCategory = SubCategory::find($id);
        if($subCategory == null){
            return view('dashboard.pages.categories.404.categories-404');
        }
        return view('dashboard.pages.sub-categories.show' , compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
            $subCategory = SubCategory::find($id);
            if($subCategory == null){
                return view('dashboard.pages.sub-Categories.404.categories-404');
            }
            if(auth()->user()->user_type == "admin"){
                return view('dashboard.pages.sub-categories.edit' , compact('subCategory'));
            }
            else{
                return view('dashboard.pages.sub-Categories.unauthorized.unauthorized');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
        $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string|max:1020',
            'create_user_id' => 'nullable',
            'update_user_id' => 'nullable',
        ]);
        $subCategory_old    = subCategory::find($id);
        $subCategory        = subCategory::find($id);
        $subCategory->title = $request->title;
        if($subCategory->title == $request->title){
            $subCategory->title = $subCategory->title;
        }
        else{
            $subCategory->title = $request->title;
        }
        $subCategory->description    = $request->description;
        $subCategory->update_user_id = auth()->user()->id;
        $subCategory->save();
        return redirect()->route('sub-categories.index')->with('Updated_Sub-Category_successfully', "the SubCategory ($subCategory_old->title) has Been updated Successfully.");
    }

    //Function Clear
    public function clearProducts($id){
        $subCategory = SubCategory::find($id);
        if($subCategory == null){
            return view('dashboard.pages.sub-categories.404.categories-404');
        }
        $subCategory->product()->delete();
        return redirect()->route('sub-categories.show', $subCategory->id)->with('deleted_subCategoryProducts_successfully', "The products for subCategory ($subCategory->title) has been deleted successfully.");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory = subCategory::find($id);
        $subCategory->delete();
        $subCategory->updated_at = null;
        $subCategory->save();
        return redirect()->route('sub-categories.index')->with('softDeleted_SubCategory_successfully' , "The category ($subCategory->title) has been moved to trash successfully.");
    }

    //function Delete
    public function delete(){
        $subCategories       = subCategory::orderBy('id', 'desc')->onlyTrashed()->simplePaginate(5);
        $subCategories_count = $subCategories->count();
        return view('dashboard.pages.sub-categories.delete', compact('subCategories', 'subCategories_count'));
    }
    public function restore($id){
        $subCategory = subCategory::withTrashed()->find($id);
        $subCategory->restore();
        $subCategory = subCategory::findOrFail($id);
        $subCategory->updated_at = null;
        $subCategory->save();
        return redirect()->route('sub-categories.index')->with('restored_subCategory_successfully', "The sub-category ($subCategory->title) has been restored successfully.");
    }

    public function forceDelete($id){
        $subCategory = SubCategory::where('id', $id);
        $subCategory->forceDelete();
        return redirect()->route('sub-categories.index')->with('forceDeleted_subcategory_successfully', "The subcategory has been permanently deleted successfully.");
    }
}