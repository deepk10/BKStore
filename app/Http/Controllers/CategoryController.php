<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        $data['categories'] = $category ;
        return view('admin/category', $data);
    }
    public function create(){
        return view('admin/add-category');
    }
    public function save(Request $request){
        $category = new Category;
        $category->category_name = $request->input('category_name');
        $category->description =  $request->input('description');
        $category->save();
        return redirect('admin/category');
    }
    public function edit(Request $request){
        $category = Category::find($request->id);
        $data['category'] = $category;
        return view('admin/edit-category', $data);
    }
    public function update(Request $request){
        $category = Category::find($request->id);
        $category->category_name = $request->input('category_name');
        $category->description =  $request->input('description');
        $category->status =  $request->input('status');
        $category->save();
        return redirect('admin/category');
    }
    public function delete(Request $request){
        $actId = $request->id;
        $category = new Category;
        $category->where('id', $actId)->delete();
        return redirect('admin/category');
    }
}