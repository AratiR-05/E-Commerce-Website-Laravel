<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use RealRashid\SweetAlert\Facades\Alert;

class colorController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function view()
    {
        $datas = Color::orderBy('id', 'desc')->get();
        return view('backend.color.view', ['active' => 'color', 'datas' => $datas]);
    }
    public function add()
    {
        return view('backend.color.add', ['active' => 'color']);

    }

    public function update($id)
    {
        $datas = Color::where('id', $id)->first();
        return view('backend.color.update', ['active' => 'color', 'datas' => $datas]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function adddata(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|min:3|max:255',

            ]
        );
        //dd($request->name);
        $datas = $request->input();
        $color = new Color;
        $color->name = $request->name;
        $color->save();
        Alert::success('Success', 'Color Added Successfully!');
        return redirect('admin/color');

    }

    /**
     * Display the specified resource.
     */
    public function updatedata(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|min:3|max:255',
            ]
        );
        // dd($request->name);
        $datas = $request->input();
        $color = Color::where('id', $request->id)->first();
        $color->name = $request->name;
        $color->save();
        Alert::success('Success', 'Color Updated Successfully!');
        return redirect('admin/color');



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function delete($id)
    {
        $color = Color::where('id', $id)->first();
        $color->delete();
        Alert::success('Success', 'Color Deleted Successfully!');
        return redirect('admin/color');
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}