<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Apolice;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        // Recuperar o usuário logado
        $user = Auth::user();

        // Verificar se o usuário está logado
        if (!$user) {
            return redirect()->route('login')->withErrors(['msg' => 'Você precisa estar logado para acessar esta página.']);
        }

        // Verificar se o usuário é administrador
        if ($user->role === 'admin') {
            // Buscar informações específicas para o administrador, se necessário
            return view('admin.profile.edit', compact('user'));
        }

        // Buscar as apólices ativas do usuário (usuário comum)
        $apolices = Apolice::where('usuario_id', $user->id)
                        ->where('status', 'ativa') // Filtrando apenas apólices ativas
                        ->get();

        // Passando o usuário e as apólices para a view de usuário comum
        return view('profile.edit', compact('user', 'apolices'));
    }






    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
