<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validação dos campos
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cpf' => ['required', 'string', 'size:14'], // Validando o CPF no formato 000.000.000-00
            'endereco' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'string', 'size:15'], // Validando o telefone no formato (XX) XXXXX-XXXX
            'datanascimento' => ['required', 'date'],
        ]);

        // Criação do usuário com os dados adicionais
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'datanascimento' => $request->datanascimento,
        ]);

        // Dispara o evento de registro
        event(new Registered($user));

        // Loga o usuário automaticamente
        Auth::login($user);

        // Redireciona para o dashboard
        return redirect(route('dashboard', absolute: false));
    }
}
