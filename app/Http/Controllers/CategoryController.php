<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //

    public function categories(){
        return view('pages.admin.categories', [
            'categories' => Category::latest()->get()
        ]);
    }

    public function createCategory(){
        return view('pages.admin.create_category');
    }

    public function storeCategory(){
        $attributes = request()->validate([
            'category' => 'string|required',
            'description' => 'string|required'
        ]);

        try{
            Category::create($attributes);
            return back()->with('message', 'Created!!');
        }
        catch(Exception $e){
            return back()->withErrors('message', 'Something went wrong!!');
        }

        return back()->withErrors('message', 'Something went wrong!!');

    }

    public function editCategory(Category $category){
        return view('pages.admin.edit_category', [
            'category' => $category
        ]);
    }

    public function updateCategory(Category $category){
        $attributes = request()->validate([
            'category' => 'string|required',
            'description' => 'string|required'
        ]);

        try{
            $category->update($attributes);
            return back()->with('message', 'Updated!!');
        }
        catch(Exception $e){
            return back()->withErrors('message', 'Something went wrong!!');
        }

        return back()->withErrors('message', 'Something went wrong!!');

    }

    public function delete(Category $category){

        try{
            $category->delete();
            return back()->with('message', 'Deleted');
        }
        catch(Exception $e){
            return back()->withErros('message', 'Something went wrong');
        }

        return back()->withErros('message', 'Something went wrong');

    }
}
