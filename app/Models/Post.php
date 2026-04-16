<?php

namespace App\Models;

use App\Models\Category;
//use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['title','content','image','category_id'];


    public static function booted(){
        static::creating(function($post){

            $post->slug = Str::slug($post->title);
          //  $post->createdby = FacadesAuth::user()->id;
        });
    }
    protected function title(){
        return Attribute::make(
           get: fn($value) => ucfirst($value),
           set: fn($value) => strtolower($value), 
        );
    }

    public function category (){
        return $this->belongsTo(Category::class);
    }

}
