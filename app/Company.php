<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
	protected $table = 'qgroup_companies';
    
    public function departments() {
    	return $this->hasMany('App\Department');
    }
}
