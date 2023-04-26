<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectorTransaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function detailCollectorTransactions()
    {
        return $this->hasMany(DetailCollectorTransaction::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
