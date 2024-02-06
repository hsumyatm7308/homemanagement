<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'slug',
        'status_id',
        'user_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



