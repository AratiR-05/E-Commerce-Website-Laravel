<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;

class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register()
    {
        return view('frontend.register', ['active' => 'register']);
    }

    public function insert(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|min:3|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|min:4|max:10',
                'repassword' => 'required|same:password',
                'mobile' => 'required',

            ]
        );
        $checkId = User::orderBy('id', 'desc')->first();
        if ($checkId) {
            $olditem = $checkId->userid;
            $firstPick = substr($olditem, 0, 2);
            $lastPick = substr($olditem, 2);
            $itemid = $firstPick . $lastPick + 1;
        } else {
            $itemid = "CP1000";
        }

        $data = $request->input();
        $student = new User;
        $student->userid = $itemid;
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->password = Hash::make($data['password']);
        $student->mobile = $data['mobile'];
        $student->save();
        return redirect('login')->with('status', "Insert successfully");

    }



    public function index()
    {
        return view('frontend.login', ['active' => 'login']);
    }


    public function login(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return redirect()->back()->withErrors([
            'invalid' => 'The provided credentials do not match our records.',
        ]);


    }


    public function store(Request $request)
    {
        //
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