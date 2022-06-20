<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserPost;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    /*public function edit() {
        $user = Auth::user();
        return view('user.edit')->withUser($user);
    }

    public function update(UserPost $request) {
        $userInput = $request->validated();
        $user = Auth::user();
        $user->fill($userInput);

        if ($request->hasFile('foto')) {

            if ($user->foto != null) {
                Storage::delete('public/fotos/' . $user->foto);
            }

            $user->foto = basename($request->file('foto')->store('public/fotos'));
        }

        if (!$request->has('telefone')) {
            $user->telefone = null;
        }

        if (!$request->has('NIF')) {
            $user->NIF = null;
        }

        $user->save();
        return redirect()->route('/');

    }

    public function editPassword()
    {
        $user = Auth::user();
        return view('user.editPassword')->withUser($user);
    }

    public function updatePassword(UserPost $request)
    {
        $request->validated();
        $user = Auth::user();
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('me');
    }

    public function editPassword() {
        $user = Auth::user();

        return view('user.editPassword')
            ->withUser($user);
    }

    public function updatePassword(UserPost $request) {
        $request->validated();
        $user = Auth::user();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('filmes');
            ->with('alert-msg', 'Palavra-passe foi alterada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function bloquear_desbloquear(ClientePost $request) {
        $validated_data = $request->validated();
        $user = User::find($validated_data['id']);
        $user->bloqueado = $validated_data['bloqueado'];

        if ($user->bloqueado == 0) {
            $user->bloqueado = 1;
            $user->save();

            return redirect()->route('admin.users')
                ->with('alert-msg', 'User "' . $user->name . '" foi bloqueado com sucesso!')
                ->with('alert-type', 'success');

        } else {
            $user->bloqueado = 0;
            $user->save();

            return redirect()->route('admin.users')
                ->with('alert-msg', 'User "' . $user->name . '" foi desbloqueado com sucesso!')
                ->with('alert-type', 'success');
        }
    }*/
}
