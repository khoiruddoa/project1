<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goldweight extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function detailConvertions()
    {
        return $this->hasMany(DetailConvertion::class);
    }
}
