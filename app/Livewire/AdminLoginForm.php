<?php

namespace App\Livewire;

use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AdminLoginForm extends Component
{
    public $email;
    public $password;
    public $remember = false;

    public $loading = false;
    public $error = '';

    public function render()
    {
        return view('admin.livewire.login-form');
    }

    public function login()
    {
        // Effectuez la vérification des informations de connexion
        // Si les informations sont valides, renvoyez une réponse positive
        // Sinon, renvoyez une réponse négative
        $this->loading = true;

        $request = new AdminLoginRequest([
            'email' => $this->email,
            'password' => $this->password,
            'remember' => $this->remember,
        ]);
        try {
            $request->authenticate();

            return redirect()->route('admin.dashboard');
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            $this->loading = false;
        }
    }
}
