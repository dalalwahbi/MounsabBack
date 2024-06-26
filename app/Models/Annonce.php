<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function favoris()
    {
        return $this->hasMany(Favoris::class);
    }

    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'accepted_at',
        'user_id',
        'category_id',
    ];
}
