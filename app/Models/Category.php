<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function detailTransactions()
    {
        return $this->hasMany(DetailTransaction::class);
    }
    public function detailCollectorTransactions()
    {
        return $this->hasMany(DetailCollectorTransaction::class);
    }

    public function categoryPrices()
    {
        return $this->hasMany(CategoryPrice::class);
    }
}
