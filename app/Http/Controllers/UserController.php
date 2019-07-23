<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Tblknowledge;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $knowledge = Tblknowledge::with('child')->get();

        return view('users.index', ['knowledges' => $knowledge, 'users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = $request->get('username');
        
        $cekUser = User::where('username', $username)->first();

        if(!empty($cekUser)){
            return redirect()->back()->with('fail', 'Username telah digunakan.');
        } else {
            $user = new User;
            $user->username = $username;
            $user->password = \Hash::make($request->get('password'));
            $user->full_name = $request->get('full_name');
            $user->level = $request->get('role');
            $user->save();

            return redirect()->back()->with('status', 'User berhasil ditambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cekUser = User::where('username', $request->username)->first();

        if(empty($cekUser) || $cekUser->username == $request->get('username_old')) {
            $user = User::findOrFail($id);
            $user->username = $request->get('username');
            $user->full_name = $request->get('full_name');
            $user->level = $request->get('role');

            if(Input::has('password')) {
                if(Input::get('password') != '') {
                    $user->password = \Hash::make($request->get('password'));
                }
            } else {
                $user->password = $request->get('password_old');
            }
            // dd($user);
            $user->save();

            return redirect()->route('users.edit', ['id' => $id])->with('success', 'User berhasil diubah.');
        }
        return redirect()->route('users.edit', ['id' => $id])->with('failed', 'Username telah terdaftar.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editUser(Request $request)
    {
        $cekUser = User::where('username', $request->username)->first();

        if(empty($cekUser) || $cekUser->username == $request->get('username_old')) {
            $user = User::find($request->user_id);
            $user->username = $request->get('username');
            $user->full_name = $request->get('full_name');
            $user->level = $request->get('role');

            if(Input::has('password')) {
                if(Input::get('password') != '') {
                    $user->password = \Hash::make($request->get('password'));
                }
            } else {
                $user->password = $request->get('password_old');
            }
            // dd($user);
            $user->save();

            return redirect()->back()->with('status', 'User berhasil diubah.');
        }
        return redirect()->back()->with('fail', 'Username telah terdaftar.');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back()->with('status', 'User berhasil dihapus.');
    }
}
