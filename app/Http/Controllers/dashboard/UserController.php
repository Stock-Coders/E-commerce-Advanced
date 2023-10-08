<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::latest()->paginate(5);
        return view('dashboard.pages.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('dashboard.pages.users.create', compact('users'));
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
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|string|max:255|unique:users',
            'phone'            => 'nullable|numeric|max:1020',
            'user_type'        => 'required|in:customer',
            // 'create_user_id'   => 'nullable|exists:users,id',
            // 'update_user_id'   => 'nullable|exists:users,id',
        ]);

        $user              = new User();
        $user->name        = $request->name;
        $user->email       = $request->email;
        $user->phone       = $request->phone;
        $user->user_type   = $request->user_type;
        // $user->create_user_id     = auth()->user()->id;
        // $user->updated_at         = null;
        $user->save();

        return redirect()->route('users.index')->with('successfully' , "The user ($user->name)has been created successfully.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if($user == null){
            return view('dashboard.pages.users.404.users-404');
        }
        return view('dashboard.pages.users.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
            $user = User::find($id);
            if($user == null){
                return view('dashboard.pages.users.404.users-404');
            }

            if($user->id == auth()->user()->id || ($user->id != auth()->user()->id && auth()->user()->user_type == "admin")){
                $users = User::all();
                return view('dashboard.pages.users.edit' , compact('user', 'users'));
            }
            else{
                return view('dashboard.pages.users.unauthorized.unauthorized');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|string|max:255|unique:users',
            'phone'            => 'nullable|numeric|max:1020',
            'user_type'        => 'required|in:customer',
            // 'create_user_id'   => 'nullable|exists:users,id',
            // 'update_user_id'   => 'nullable|exists:users,id',
        ]);

        $user_old        = User::find($id);
        $user            = User::find($id);
        if($user->name == $request->name){
            $user->name = $user->name;
        }
        else{
            $user->name = $request->name;
        }
        $user->email     = $request->email;
        $user->phone     = $request->phone;
        $user->user_type = $request->user_type;
        // $user->update_user_id     = auth()->user()->id;
        $user->save();
        return redirect()->route('users.index')->with('successfully', "The user ($user_old->name) has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('successfully' , "The user ($user->name) has been moved to trash successfully.");
    }
}
