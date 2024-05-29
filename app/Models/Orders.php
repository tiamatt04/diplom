<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id')->first()->status_name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
