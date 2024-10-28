<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\BlogTags;

class Blog extends Model
{
    //
    use HasFactory;

    protected $guarded = [];
    protected $with = ['category', 'tags'];


    public function scopeSearch($query, $search){
        $query->when($search ?? false, function ($query, $search){
            return $query->where('title', 'like', '%'.$search.'%')
                         ->orWhere('body', 'like', '%'.$search.'%')
                        ->orWhereHas('category', function ($query) use ($search){
                            $query->where('category', 'like', '%'.$search.'%');
                        });
        });
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->hasMany(BlogTags::class);
    }
}
