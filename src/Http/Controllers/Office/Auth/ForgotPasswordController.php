<?php

namespace Glitter\Http\Controllers\Office\Auth;

use Glitter\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\PasswordBrokerFactory as Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    private $password;

    public function __construct(Password $password)
    {
        $this->password = $password;
    }

    public function showLinkRequestForm()
    {
        return view('glitter.office::auth.passwords.email');
    }

    public function broker()
    {
        return $this->password->broker('member');
    }
}
