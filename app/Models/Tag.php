<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\BlogTags;

class Tag extends Model
{
    //
    use HasFactory;

    protected $guarded = [];

    public function blog_tags(){
        return $this->hasMany(BlogTags::class);
    }

}
