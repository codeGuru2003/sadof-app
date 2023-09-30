<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'member_id', // Add other attributes here as needed
        'payment_type_id',
        'remarks',
        'amount',
        'payment_date',
        'process_by',
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function paymenttype(){
        return $this->belongsTo(PaymentType::class);
    }
    use HasFactory;
}
