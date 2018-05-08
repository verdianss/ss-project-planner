<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Company extends Model
{
    protected $table = 'companies';

    protected $rules = [
        'name' => ['required'],
        'subdomain_name' => ['required'],
        'owner_id' => ['required'],
        'timezone_id' => ['required'],
        'workable_hours' => ['required'],
        'default_booking_duration' => ['required'],
    ];

    protected $messages = [
        'name.required' => 'please fill Company Name field',
        'subdomain_name.required' => 'please fill Subdomain Name field',
    ];


    public function validate($data) 
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules);
        // return the result
        return $v->passes();
    }
}
