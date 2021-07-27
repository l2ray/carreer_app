<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use Notifiable;

    //
    public function company() {
    	return $this->belongsTo('App\Company', 'company_of_interest');
    }

    public function department() {
    	return $this->belongsTo('App\Department', 'area_of_interest');
    }
 
}
