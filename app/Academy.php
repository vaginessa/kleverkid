<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    public function images() {
        return $this->hasMany('App\AcademyImage','academy_id','id');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag','academy_tags','academy_id','tag_id');
    }

    public function timeslots() {
        return $this->hasMany('App\Timeslot','academy_id','id');
    }
}
