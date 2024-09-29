<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $fillable=['content','user_id','phone'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
