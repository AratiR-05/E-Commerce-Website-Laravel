<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;

class categoryController extends Controller
{

    public function view()
    {
        $datas = Category::orderBy('id', 'desc')->get();
        return view('backend.category.view', ['active' => 'category', 'datas' => $datas]);
    }
    public function add()
    {
        return view('backend.category.add', ['active' => 'category']);

    }

    public function update($id)
    {
        $datas = Category::where('id', $id)->first();
        return view('backend.category.update', ['active' => 'category', 'datas' => $datas]);
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
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        Alert::success('Success', 'Category Added Successfully!');
        return redirect('admin/category');

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
        $category = Category::where('id', $request->id)->first();
        $category->name = $request->name;
        $category->save();
        Alert::success('Success', 'Category Updated Successfully!');
        return redirect('admin/category');



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function delete($id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();
        Alert::success('Success', 'Category Deleted Successfully!');
        return redirect('admin/category');
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