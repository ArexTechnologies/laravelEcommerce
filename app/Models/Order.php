<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
   // use HasFactory;
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'items' => 'array',
    // ];
    protected $primaryKey = 'order_id';
  
    protected $fillable = ['name', 'email', 'address', 'phone','total', 'items','info', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
  
    
  
}