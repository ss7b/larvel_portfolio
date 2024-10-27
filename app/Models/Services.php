<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'icon',
        'user_id',
    ];
    public function user()  {
        return $this->belongsTo(User::class);
    }
}
