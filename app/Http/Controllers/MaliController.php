<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MaliController extends Controller
{
    public function send()
    {
        $userEmail = 'djordjijevujovic210306@gmail.com';

        Mail::to($userEmail)->send(new SendMail());

        return "E-mail poslat uspešno!";
    }
}
?>
