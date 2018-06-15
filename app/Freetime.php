<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Carbon;

class Freetime extends Model
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
