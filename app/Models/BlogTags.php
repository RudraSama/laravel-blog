<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Blog;
use App\Models\Tag;

class BlogTags extends Model
{
    //
    use HasFactory;

    protected $guarded = [];
    protected $with = ['tag'];

    public function tag(){
        return $this->belongsTo(Tag::class);
    }

}
