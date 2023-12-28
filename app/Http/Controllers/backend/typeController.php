<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use RealRashid\SweetAlert\Facades\Alert;

class typeController extends Controller
{
    // view
    public function view()
    {
        $datas = Type::orderBy('id', 'desc')->get();
        return view('backend.type.view', ['active' => 'type', 'datas' => $datas]);
    }
    // Add
    public function add()
    {
        return view('backend.type.add', ['active' => 'type']);

    }
    //Add Data
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
        $type = new Type;
        $type->name = $request->name;
        $type->save();
        Alert::success('Success', 'Type Added Successfully!');
        return redirect('admin/type');

    }

    // Update
    public function update($id)
    {
        $datas = Type::where('id', $id)->first();
        return view('backend.type.update', ['active' => 'type', 'datas' => $datas]);
    }


    // Update Data
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
        $type = Type::where('id', $request->id)->first();
        $type->name = $request->name;
        $type->save();
        Alert::success('Success', 'type Updated Successfully!');
        return redirect('admin/type');



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function delete($id)
    {
        $type = Type::where('id', $id)->first();
        $type->delete();
        Alert::success('Success', 'Type Deleted Successfully!');
        return redirect('admin/type');
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