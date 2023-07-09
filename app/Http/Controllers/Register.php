<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Facades\DB;

class Register extends Controller
{
    function Index() {
        return veiw("vuja");
    }
    function add() {
        DB::insert('insert into users (id, First_name, Last_name, mail, gender, role_id,  ed_program_id, class_Id) values (?, ?,?,?,?,?,?,?)', [1, 'Dayle','Dayle','Dayle','Dayle', 2,2,2]);
    }
}
