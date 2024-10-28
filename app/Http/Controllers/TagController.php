<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;

class TagController extends Controller
{
    //
    public function tags(){
        return view('pages.admin.tags', [
            'tags' => Tag::latest()->get()
        ]);
    }

    public function createTag(){
        return view('pages.admin.create_tag');
    }

    public function storeTag(){
        $attributes = request()->validate([
            'tag' => 'string|required',
            'description' => 'string|required',
            'tag_color' => 'string|required'
        ]);

        try{
            Tag::create($attributes);
            return back()->with('message', 'Created!!');
        }
        catch(Exception $e){
            return back()->withErrors('message', 'Something went wrong!!');
        }

        return back()->withErrors('message', 'Something went wrong!!');
    }

    public function editTag(Tag $tag){
        return view('pages.admin.edit_tag', [
            'tag' => $tag
        ]);
    }

    public function updateTag(Tag $tag){
        $attributes = request()->validate([
            'tag' => 'string|required',
            'description' => 'string|required',
            'tag_color' => 'string|required'
        ]);

        try{
            $tag->update($attributes);
            return back()->with('message', 'Updated!!');
        }
        catch(Exception $e){
            return back()->withErrors('message', 'Something went wrong!!');
        }
        return back()->withErrors('message', 'Something went wrong!!');
    }

    public function delete(Tag $tag){

        try{
            $tag->delete();
            return back()->with('message', 'Deleted');
        }
        catch(Exception $e){
            return back()->withErrors('message', 'Something went wrong');
        }

        return back()->withErrors('message', 'Something went wrong');

    }

}
