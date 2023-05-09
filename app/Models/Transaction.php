<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function detailTransactions()
    {
        return $this->hasMany(DetailTransaction::class);
    }
    public function detailPicks()
    {
        return $this->hasMany(DetailPick::class);
    }
    public function cancelTransactions()
    {
        return $this->hasMany(CancelTransaction::class);
    }
    public function picks()
    {
        return $this->hasMany(Pick::class);
    }



}
