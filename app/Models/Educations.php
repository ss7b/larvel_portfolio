<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'from',
        'to',
        'provider',
        'graduation',
        'user_id',
    ];
    public function user()  {
        return $this->belongsTo(User::class);
    }
}
