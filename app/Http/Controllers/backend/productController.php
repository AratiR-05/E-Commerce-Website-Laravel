<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

class productController extends Controller
{
    //View
    public function view()
    {
        $datas = Product::orderBy('id', 'desc')->get();
        return view('backend.product.view', ['active' => 'product', 'datas' => $datas]);
    }
    // Add
    public function add()
    {
        $categories = Category::get();
        $types = Type::get();
        $sizes = Size::get();
        $colors = Color::get();
        return view('backend.product.add', ['active' => 'product', 'categories' => $categories, 'types' => $types, 'sizes' => $sizes, 'colors' => $colors]);

    }
    // Add Data
    public function adddata(Request $request)
    {
        $this->validate(
            $request,
            [
                'category' => 'required',
                'name' => 'required|string|min:3|max:255',
                'type' => 'required',
                'size' => 'required',
                'color' => 'required',
                'price' => 'required',
                'description' => 'required',
                'imgpath' => 'required|image|mimes:jpg,png,jpeg,gif,svg,avif,webp|max:2048',


            ]
        );
        $checkId = Product::orderBy('id', 'desc')->first();
        if ($checkId) {
            $olditem = $checkId->proid;
            $firstPick = substr($olditem, 0, 2);
            $lastPick = substr($olditem, 2);
            $itemid = $firstPick . $lastPick + 1;
        } else {
            $itemid = "PD1000";
        }
        //dd($request->name);
        $datas = $request->input();
        $product = new Product;
        $product->proid = $itemid;
        $product->category = $request->category;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->price = $request->price;
        $product->description = $request->description;
        // $product->imgpath = $request->imgpath;
        $path = $request->file('imgpath')->store('public/images');
        $product->imgpath = $path;
        $product->save();
        Alert::success('Success', 'Product Added Successfully!');
        return redirect('admin/product');

    }


    // Update
    public function update($id)
    {
        $categories = Category::get();
        $types = Type::get();
        $sizes = Size::get();
        $colors = Color::get();
        $datas = Product::where('id', $id)->first();
        return view('backend.product.update', ['active' => 'product', 'datas' => $datas, 'categories' => $categories, 'types' => $types, 'sizes' => $sizes, 'colors' => $colors]);
    }

    // Update Data
    public function updatedata(Request $request)
    {

        $this->validate(
            $request,
            [
                'category' => 'required',
                'name' => 'required|string|min:3|max:255',
                'type' => 'required',
                'size' => 'required',
                'color' => 'required',
                'price' => 'required',
                'description' => 'required',
                'imgpath' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            ]
        );
        // dd('test');
        $datas = $request->input();
        $product = Product::where('id', $request->id)->first();
        $product->category = $request->category;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->price = $request->price;
        $product->description = $request->description;
        if ($request->imgpath) {
            $this->validate($request, [
                'imgpath' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ]);
            $path = $request->file('imgpath')->store('public/images');
            $product->imgpath = $path;
        }
        $product->save();
        Alert::success('Success', 'Product Updated Successfully!');
        return redirect('admin/product');

    }


    public function delete($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        Alert::success('Success', 'Product Deleted Successfully!');
        return redirect('admin/product');
    }


    public function destroy(string $id)
    {
        //
    }
    public static function ctgshow($id)
    {
        $data = Category::where('id', $id)->first();
        if ($data) {
            return $data->name;
        } else {
            return $id;
        }
    }
    public static function typshow($id)
    {
        $data = Type::where('id', $id)->first();
        if ($data) {
            return $data->name;
        } else {
            return $id;
        }
    }
    public static function sizeshow($id)
    {
        $data = Size::where('id', $id)->first();
        if ($data) {
            return $data->name;
        } else {
            return $id;
        }
    }
    public static function clrshow($id)
    {
        $data = Color::where('id', $id)->first();
        if ($data) {
            return $data->name;
        } else {
            return $id;
        }
    }
}