<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Company extends Model
{
	 
    //public $updated_at = false;
    //public $updated_at = false;
    //public $timestamps = false;
    protected $table = 'companies';
	//Mass Assignment
	protected $fillable = ['id', 'marketing_document_original_name',  'marketing_document_new_name', 'logo_original_name',  'logo_new_name', 'contact_detail', 'admin' ];
 

}
