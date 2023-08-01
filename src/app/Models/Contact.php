<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion'
    ];

    public function scopeFullnameSearch($query, $fullname)
    {
        if (!empty($fullname)) {
        $query->where('fullname', $fullname);
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
        $query->where('gender', $gender);
        }
    }

    public function scopeEmailSearch($query, $email)
    {
        if (!empty($email)) {
        $query->where('email', 'like', '%' . $email . '%');
        }
    }

    public function scopeCreated_atSearch($query, $created_at)
    {
        if (!empty($created_at)) {
        $query->where('created_at', $created_at);
        }
    }
}
