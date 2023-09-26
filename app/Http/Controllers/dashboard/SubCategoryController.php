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
        $subCategories = SubCategory::latest()->Paginate(5);
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
           'create_user_id' =>'nullable|exists:users,id',
           'update_user_id' =>'nullable|exists:users,id',
        ]);

        $subCategory   = new SubCategory();
        $subCategory->title          = $request->title;
        $subCategory->description    = $request->description;
        $subCategory->create_user_id = auth()->user()->id;
        $subCategory->update_at      = null;
        $subCategory->save();

        return redirect()->route('subCategories.index')->with('created_subCategory_successfully' , "The sub-category ($subCategory->title)has been Created Successfully.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $SubCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $subCategory = SubCategory::find($id);
        if($subCategory == null){
            return view('dashboard.pages.categories.404.sub-categories-404');
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
                return view('dashboard.pages.sub-categories.404.sub-categories-404');
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
            'create_user_id' => 'nullable|exists:users,id',
            'update_user_id' => 'nullable|exists:users,id',
        ]);
        $subCategory_old    = SubCategory::find($id);
        $subCategory        = SubCategory::find($id);
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
        return redirect()->route('subCategories.index')->with('updated_subCategory_successfully', "The sub-category ($subCategory_old->title) has Been updated Successfully.");
    }

    //Function Clear
    public function clearProducts($id){
        $subCategory = SubCategory::find($id);
        if($subCategory == null){
            return view('dashboard.pages.sub-categories.404.sub-categories-404');
        }
        $subCategory->product()->delete();
        return redirect()->route('subCategories.show', $subCategory->id)->with('deleted_subCategoryProducts_successfully', "The products for sub-category ($subCategory->title) has been deleted successfully.");
    }

 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        $subCategory->updated_at = null;
        $subCategory->save();
        return redirect()->route('subCategories.index')->with('softDeleted_subCategory_successfully' , "The sub-category ($subCategory->title) has been moved to trash successfully.");
    }

    //function Delete
    public function delete(){
        $subCategories       = SubCategory::orderBy('id', 'desc')->onlyTrashed()->simplePaginate(5);
        $subCategories_count = $subCategories->count();
        return view('dashboard.pages.sub-categories.delete', compact('subCategories', 'subCategories_count'));
    }
    public function restore($id){
        $subCategory = SubCategory::withTrashed()->find($id);
        $subCategory->restore();
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->updated_at = null;
        $subCategory->save();
        return redirect()->route('subCategories.index')->with('restored_subCategory_successfully', "The sub-category ($subCategory->title) has been restored successfully.");
    }

    public function forceDelete($id){
        $subCategory = SubCategory::where('id', $id);
        $subCategory->forceDelete();
        return redirect()->route('subCategories.index')->with('forceDeleted_subCategory_successfully', "The sub-category has been permanently deleted successfully.");
    }
}
