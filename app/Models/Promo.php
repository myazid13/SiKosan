<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
      'kamar_id','harga_promo','pemilik_id','status','description'
    ];

    public function kamar()
    {
      return $this->hasOne(kamar::class, 'id','kamar_id');
    }
}
