<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //
    public function monitoring()
    {
        return $this->hasOne(Monitoring::class, 'applicant_id', 'id');
    }

}
