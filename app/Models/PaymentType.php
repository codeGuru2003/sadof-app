<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    use HasFactory;
}
