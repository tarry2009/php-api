<?php

namespace Tests\Unit;

use App\Results;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehicleTest extends TestCase
{
	
	
/**
* testing keys of result
* 
*  
*/
	public function testVerifyKeys()
	{
		$results = array();
		$results = $this->getData('http://localhost/vehicles/2015/Audi/A3');
		$this->assertArrayHasKey('Count', $results); 
		$this->assertArrayHasKey('Results', $results); 
		$this->assertCount(4, $results['Results']);
	}
	
/**
* testing values of result
* 
*  
*/
	public function testHasItemInResults()
    { 
        $results = new Results($this->getData('http://localhost/vehicles/2015/Audi/A3')); 
        $this->assertFalse($results->has(9));
        $this->assertTrue($results->has(4));
    }
    
/**
* getting results of an api
* 
*  @returning array
*/      
    public function getData($url = 'http://localhost/vehicles/'){ 
		return json_decode(file_get_contents($url), true);
	}
    
    
	 
	
	
}
