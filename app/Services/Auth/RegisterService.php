<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Mail\VerifyMail;
use Illuminate\Contracts\Mail\Mailer;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterService
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function register(RegisterRequest $request)
    {
        $user = User::register(
            $request['name'],
            $request['email'],
            $request['password']
        );
        
        // $this->mailer->to($user->email)->send(new VerifyMail($user));
    }

    public function verify($id)
    {
        $user = User::findOrFail($id);
        $user->verify();
    }
}
