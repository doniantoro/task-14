<?php

use Illuminate\Database\Seeder;

use App\Paid_leave;

class paid_leaveSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $paid_leave = new paid_leave();
        $paid_leave->id_employee = 3;
        $paid_leave->start = '2020-09-07';
        $paid_leave->until = '2020-09-09';
        $paid_leave->status = 'approved';
        $paid_leave->reason = 'sick';
        $paid_leave->save();



        $paid_leave = new paid_leave();
        $paid_leave->id_employee = 4;
        $paid_leave->start = '2020-09-07';
        $paid_leave->until = '2020-09-09';
        $paid_leave->status = 'rejected';
        $paid_leave->reason = 'Holiday';
        $paid_leave->save();

        $paid_leave = new paid_leave();
        $paid_leave->id_employee = 4;
        $paid_leave->start = '2020-09-07';
        $paid_leave->until = '2020-09-09';
        $paid_leave->status = 'proccessed';
        $paid_leave->reason = 'Holiday';
        $paid_leave->save();
    }
}
