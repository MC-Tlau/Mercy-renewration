<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id', 'id'); 
    }
}
