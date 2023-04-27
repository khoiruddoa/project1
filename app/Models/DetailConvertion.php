<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailConvertion extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function convertion()
    {
        return $this->belongsTo(Convertion::class);
    }

}
