<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Exibir a lista de usuários
    public function index()
    {
        // Carregar todos os usuários, exceto admins
        $usuarios = User::where('role', '!=', 'admin')->paginate(10);

        return view('admin.usuarios.index', compact('usuarios'));
    }

    // Exibir o formulário para criar um novo usuário
    public function create()
    {
        return view('admin.usuarios.create');
    }

    // Salvar um novo usuário
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'cpf' => 'nullable|numeric|digits:11|unique:users', // Validação para CPF único
            'datanascimento' => 'nullable|date',
            'telefone' => 'nullable|numeric|digits_between:10,15|unique:users', // Validação para telefone único
            'endereco' => 'nullable|string|max:255',
            'historicomedico' => 'nullable|string',
            'role' => 'required|string|in:admin,user',
        ]);

        // Criação do usuário com os dados validados
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'cpf' => $validated['cpf'] ?? null,
            'datanascimento' => $validated['datanascimento'] ?? null,
            'telefone' => $validated['telefone'] ?? null,
            'endereco' => $validated['endereco'] ?? null,
            'historicomedico' => $validated['historicomedico'] ?? null,
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }


    // Exibir o formulário para editar um usuário
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.usuarios.edit', compact('user'));
    }

    // Atualizar um usuário
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
            'password' => 'nullable|string|min:8|confirmed',
            'cpf' => 'nullable|numeric|digits:11|unique:users,cpf,' . $usuario->id, // Validação para CPF único, ignorando o próprio usuário
            'datanascimento' => 'nullable|date',
            'telefone' => 'nullable|numeric|digits_between:10,15|unique:users,telefone,' . $usuario->id, // Validação para telefone único, ignorando o próprio usuário
            'endereco' => 'nullable|string|max:255',
            'historicomedico' => 'nullable|string',
            'role' => 'required|string|in:admin,user',
        ]);

        $usuario->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $request->password ? Hash::make($validated['password']) : $usuario->password,
            'cpf' => $validated['cpf'] ?? $usuario->cpf,
            'datanascimento' => $validated['datanascimento'] ?? $usuario->datanascimento,
            'telefone' => $validated['telefone'] ?? $usuario->telefone,
            'endereco' => $validated['endereco'] ?? $usuario->endereco,
            'historicomedico' => $validated['historicomedico'] ?? $usuario->historicomedico,
            'role' => $validated['role'],
        ]);

         // Validação e atualização do usuário
        $usuario->update($request->all());

        // Adiciona a mensagem de sucesso na sessão
        session()->flash('success', 'Usuário atualizado com sucesso!');

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }



    // Excluir um usuário
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        // Excluir o usuário
        $usuario->delete();

        // Adiciona a mensagem de sucesso na sessão
        session()->flash('success', 'Usuário excluído com sucesso!');
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
