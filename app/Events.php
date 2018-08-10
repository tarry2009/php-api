<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Events extends Model
{
	 
    //public $updated_at = false;
    //public $updated_at = false;
    //public $timestamps = false;
    protected $table = 'events';
	//Mass Assignment
	protected $fillable = ['id', 'name',  'place', 'lat', 'long', 'start_date', 'end_date' ];
 

}
