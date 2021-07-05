<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paid_leave extends Model
{
    
    public $timestamps =false;
    public $table = "paid_leave";

    public function employee()
    {
        return $this->belongsTo('App\EmployeeInformation','id_employee');
    }

}
