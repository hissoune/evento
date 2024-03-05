<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'Event_id',
        'user_id',
        'accepted',
    ];
    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    
      }
      public function Events(){
        return $this->belongsTo(Event::class, 'Event_id');
    
      }
}
