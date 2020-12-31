<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    public function __construct(){
    	//$this->code = rand(1000, 9999);
    	$this->code = 1111;
    	$this->time = time();
    }
}
