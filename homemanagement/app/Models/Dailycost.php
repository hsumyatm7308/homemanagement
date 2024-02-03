<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dailycost extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'dailycosts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image',
        'name',
        'remark',
        'amount',
        'category_id',
        'user_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
