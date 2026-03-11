<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $primaryKey = 'donation_id';
    protected $table = 'donations';
    protected $guarded = [];
}
