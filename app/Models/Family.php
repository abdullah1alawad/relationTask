<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $fillable=['name','nationalId','phone', 'city_id'];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function plants()
    {
        return $this->belongsToMany(Plant::class);
    }
}
