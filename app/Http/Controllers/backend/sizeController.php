<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use RealRashid\SweetAlert\Facades\Alert;

class sizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function view()
    {
        $datas = size::orderBy('id', 'desc')->get();
        return view('backend.size.view', ['active' => 'size', 'datas' => $datas]);
    }
    public function add()
    {
        return view('backend.size.add', ['active' => 'size']);

    }

    public function update($id)
    {
        $datas = Size::where('id', $id)->first();
        return view('backend.size.update', ['active' => 'size', 'datas' => $datas]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function adddata(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string',

            ]
        );
        //dd($request->name);
        $datas = $request->input();
        $size = new Size;
        $size->name = $request->name;
        $size->save();
        Alert::success('Success', 'Size Added Successfully!');
        return redirect('admin/size');

    }

    /**
     * Display the specified resource.
     */
    public function updatedata(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
            ]
        );
        // dd($request->name);
        $datas = $request->input();
        $size = Size::where('id', $request->id)->first();
        $size->name = $request->name;
        $size->save();
        Alert::success('Success', 'Size Updated Successfully!');
        return redirect('admin/size');



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function delete($id)
    {
        $size = Size::where('id', $id)->first();
        $size->delete();
        Alert::success('Success', 'Size Deleted Successfully!');
        return redirect('admin/size');
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