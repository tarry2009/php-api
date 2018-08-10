<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Stands extends Model
{
	 
    //public $updated_at = false;
    //public $updated_at = false;
    //public $timestamps = false;
    protected $table = 'event_stands';
	//Mass Assignment
	protected $fillable = ['id',  'event_id', 'price', 'status', 'company_id' ];
 

}
