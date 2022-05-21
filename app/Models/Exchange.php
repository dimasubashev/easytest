<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['from_currency', 'to_currency', 'rate', 'amount', 'result', 'date'];

}
