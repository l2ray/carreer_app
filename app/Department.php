<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    
	protected $table  = 'qgroup_departments';
    //
    public function company() {
    	return $this->belongsTo('App\Company');
    }
}
 