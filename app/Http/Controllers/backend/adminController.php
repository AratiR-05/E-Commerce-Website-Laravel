<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use User;
use Validator;
use Hash;
use Auth;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = Admin::count();
        return view('backend.login', ['active' => 'login', 'totaladmin' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        $count = Admin::count();
        if (!$count) {
            return view('backend.registration');
        } else {
            return redirect('admin');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insert(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|min:3|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|min:4|max:10',
                'repassword' => 'required|same:password'
            ]
        );

        $data = $request->input();
        $student = new Admin;
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->password = Hash::make($data['password']);
        $student->save();
        return redirect('admin/')->with('status', "Insert successfully");

    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return redirect()->back()->withErrors([
            'invalid' => 'The provided credentials do not match our records.',
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}