<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $fillable=[
    	'date_from',
    	'date_to',
    	'user_id',
    	'active'
    ];

	protected $dates = ['date_from', 'date_to'];
    
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
