<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory,SoftDeletes;

protected $fillable=[
    'title',
    'description',
    'start_date',
    'end_date',
    'location' ,
    'image' ,
    'number_places' ,
    'categories_id' ,
    'status' ,
    'users_id' ,
];



  public function categorie(){
    return $this->belongsTo(Category::class, 'categories_id');

  }
  public function User(){
    return $this->belongsTo(User::class, 'users_id');

  }
}
