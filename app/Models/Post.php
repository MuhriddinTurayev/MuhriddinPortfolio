<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id',  'category_id', 'title', 'short_content', 'content', 'photos'];

    // protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(user::class);
     }

     
     public function category(){
        return $this->belongsTo(Category::class);
     }
   


    public function comments(){
       
        return $this->hasMany(Comment::class);
    }



  public function tags(){
    return $this->BelongsToMany(Tag::class);
  }
}
