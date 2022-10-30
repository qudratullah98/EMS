<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "last_name",
        "addrass",
        "country_id",
        "city_id",
        "stat_id",
        "department_id",
    ];
}
