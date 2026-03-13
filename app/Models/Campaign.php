<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $primaryKey = 'campaign_id';
    protected $table = 'campaigns';
    protected $guarded = [];

    public function donations()
    {
        return $this->hasMany(Donation::class, 'campaign_id', 'campaign_id');
    }
}
