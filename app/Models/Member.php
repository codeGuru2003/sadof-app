<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'dateofbirth',
        'gender_id',
        'address',
        'contact_1',
        'contact_2',
        'email',
        'image', // Add 'image' to the fillable attributes
        'is_leader',
        'position_id',
        'birth_month_id',
    ];
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
    public function position(){
        return $this->belongsTo(Position::class,'position_id');
    }
    public function birthmonth(){
        return $this->belongsTo(BirthMonth::class, 'birth_month_id');
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    use HasFactory;
}
