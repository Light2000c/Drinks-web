<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class Categorycontroller extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.category', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:categories,title',
        ]);

        try {
         return   $this->saveCategory($request);
        } catch (Exception $e) {
            // return back()->with('error', 'Something went wrong, please try again later.');
            return back()->with('error', $e->getMessage());
        }
    }

    public function saveCategory($data)
    {

        $category = Category::create([
            'title' => $data->title,
        ]);


        if (!$category) {
            return back()->with('error', 'Category was not successfully added.');
        }

        return back()->with('success', 'Category has been successfully added.');
    }

    public function update()
    {
    }

    public function destroy(Category $category)
    {
        $delete  = $category->delete();

        try{

        if(!$delete){
            return back()->with('error', 'Category was not successfully deleted.');
        }

        return back()->with('success', 'Category has been successfully deleted.');

    }catch(Exception $e){
         // return back()->with('error', 'Something went wrong, please try again later.');
         return back()->with('error', $e->getMessage());
    }
    }
}
