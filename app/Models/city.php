<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class city extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "stat_id"
    ];
    public function stat(){
        return $this->BelongsTo(stat::class);
    }
}
