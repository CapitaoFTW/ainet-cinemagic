<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Http\Requests\SalaPost;

class SalaController extends Controller {
    public function create() {
        $newSala = new Sala;

        return view('salas.create')
            ->withSala($newSala);
    }

    public function store(SalaPost $request) {
        $validated_data = $request->validated();
        Sala::create($validated_data);

        return redirect()->route('admin.salas')
            ->with('alert-msg', 'A Sala "' . $validated_data['nome'] . '" foi criada com sucesso!')
            ->with('alert-type', 'success');
    }
    public function admin() {
        $salas = Sala::all();

        return view('salas.admin')->withSalas($salas);
    }

    public function edit(Sala $sala) {
        return view('salas.edit')
            ->withSala($sala);
    }

    public function update(SalaPost $request, Sala $sala) {
        $validated_data = $request->validated();
        $sala->fill($validated_data);
        $sala->save();

        return redirect()->route('admin.salas')
            ->with('alert-msg', 'Sala "' . $sala->nome . '" foi alterada com sucesso!')
            ->with('alert-type', 'success');
    }

    public function destroy(Sala $sala) {
        $oldName = $sala->nome;

        try {

            $sala->delete();

            return redirect()->route('admin.salas')
                ->with('alert-msg', 'Sala "' . $sala->nome . '" foi apagada com sucesso!')
                ->with('alert-type', 'success');

        } catch (\Throwable $th) {
            // $th é a exceção lançada pelo sistema - por norma, erro ocorre no servidor BD MySQL
            // Descomentar a próxima linha para verificar qual a informação que a exceção tem
            //dd($th, $th->errorInfo);

            if ($th->errorInfo[1] == 1451) {   // 1451 - MySQL Error number for "Cannot delete or update a parent row: a foreign key constraint fails (%s)"

                return redirect()->route('admin.salas')
                    ->with('alert-msg', 'Não foi possível apagar a Sala "' . $oldName . '", porque esta sala já está em uso!')
                    ->with('alert-type', 'danger');

            } else {

                return redirect()->route('admin.salas')
                    ->with('alert-msg', 'Não foi possível apagar a Sala "' . $oldName . '". Erro: ' . $th->errorInfo[2])
                    ->with('alert-type', 'danger');
            }
        }
    }
}
