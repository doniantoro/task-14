<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeInformation extends Model
{
    //

    public $timestamps =false;
    public $table = "employee";

    protected $fillable = [
        'name', 'tittle', 'adress','phone','paid_leave','user_id'];

        public function paid_leave()
        {
            return $this->hasMany('App\Paid_leave','id');
        }
}
