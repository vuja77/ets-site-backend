<?php
namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;

class MaliController extends Controller
{
    public function send()
    {
        $user = Auth::user();
        $userEmail = $user->mail;
        $data = [
            'name' => $user->first_name . " " . $user->last_name,
            'date' => date('Y-m-d'),
        ];
        $datum = date('Y-m-d');

        $pdf = PDF::loadView('pdf.view', $data);

        Mail::to($userEmail)->send(new SendMail($pdf));

        return "E-mail poslat uspešno!";
    }
}
