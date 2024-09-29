<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable=['title','description','price'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('filled_in')->withTimestamps();
    }
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
