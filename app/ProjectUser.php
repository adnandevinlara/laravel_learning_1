<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUser extends Pivot
{
    public function manager(){
    	return $this->belongsTo(User::class,'manager_id');
    }
}
