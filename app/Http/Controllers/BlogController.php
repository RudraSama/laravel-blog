<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\BlogTags;

class BlogController extends Controller
{
    //
    public function blogs(){
        return view('pages.index',[
            'blogs' => Blog::where('published', 1)->latest()->search(request('search'))->paginate(7)
        ]);
    }

    public function blog(Blog $blog){
        return view('pages.blog', [
            'blog' => $blog
        ]);
    }

    public function createBlog(){
        return view('pages.admin.create_blog', [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function storeBlog(){


        $attributes = request()->validate([
            'author' => 'string|required',
            'title' => 'string|required',
            'excerpt' => 'string|required',
            'banner_url' => 'string|required',
            'category_id' => 'integer|required',
            'body' => 'string|required'
        ]);

        //is save as draft is on then published is false
        $attributes["published"] = request()->get('published') == null?true:false;

        try{
            $blog = Blog::create($attributes);

            $tags = request()->get('tags');

            if($tags == null || count($tags) <= 0){
                return back()->withErrors('message', 'Something went wrong');
            }

            foreach($tags as $tag_id){
                BlogTags::create([
                    "blog_id" => $blog->id,
                    "tag_id" => $tag_id
                ]);
            }

            return back()->with('message', 'PUBLISHED!!');

        }
        catch(Exception $e){
            return back()->withErrors('message', 'Something went wrong');
        }


        return back()->withErrors('message', 'Something went wrong');


    }

    public function editBlog(Blog $blog){

        //blog_tags array with only IDs
        $blog_tags = [];

        foreach($blog->tags as $tag){
            array_push($blog_tags, $tag->tag->id);
        }

        return view('pages.admin.edit_blog', [
            'blog' => $blog,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'blog_tags'=> $blog_tags
        ]);

    }


    public function updateBlog(Blog $blog){
        $attributes = request()->validate([
            'title' => 'string|required',
            'excerpt' => 'string|required',
            'banner_url' => 'string|required',
            'category_id' => 'integer|required',
            'body' => 'string|required'
        ]);

        $attributes["published"] = request()->get('published') == null?true:false;

        try{
            $blog->update($attributes);

            $tags = request()->get('tags');

            //deleting all tags from this blog;
            BlogTags::where('blog_id', $blog->id)->delete();

            foreach($tags as $tag_id){
                BlogTags::create([
                    "blog_id" => $blog->id,
                    "tag_id" => $tag_id
                ]);
            }

            return back()->with('message', 'UPDATED');

        }
        catch(Exception $e){
            return back()->withErrors('message', 'Something went wrong');
        }


        return back()->withErrors('message', 'Something went wrong');

    }


    public function delete(Blog $blog){

        try{

            //delete tags of blog first
            BlogTags::where('blog_id', $blog->id)->delete();
            $blog->delete();
            return back()->with('message', 'Deleted');
        }
        catch(Exception $e){
            return back()->with('message', 'Something went wrong');
        }

        return back()->with('message', 'Something went wrong');

    }

}
