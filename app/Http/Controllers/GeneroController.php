<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;
use App\Http\Requests\GeneroPost;

class GeneroController extends Controller {
    public function create() {
        $newGenero = new Genero;

        return view('generos.create')
            ->withGenero($newGenero);
    }

    public function store(GeneroPost $request) {
        $validated_data = $request->validated();
        Genero::create($validated_data);

        return redirect()->route('admin.generos')
            ->with('alert-msg', 'Genero "' . $validated_data['nome'] . '" foi criado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function admin() {
        $generos = Genero::all();

        return view('generos.admin')->withGeneros($generos);
    }

    public function edit(Genero $genero) {
        return view('generos.edit')
            ->withGenero($genero);
    }

    public function update(GeneroPost $request, Genero $genero)
    {
        $validated_data = $request->validated();
        $genero->fill($validated_data);
        $genero->save();
        return redirect()->route('admin.generos')
            ->with('alert-msg', 'Genero "' . $genero->nome . '" foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }

   public function destroy(Genero $genero)
    {
        $oldName = $genero->nome;

        try {

            $genero->delete();

            return redirect()->route('admin.generos')
                ->with('alert-msg', 'Genero "' . $genero->nome . '" foi apagado com sucesso!')
                ->with('alert-type', 'success');

        } catch (\Throwable $th) {
            // $th é a exceção lançada pelo sistema - por norma, erro ocorre no servidor BD MySQL
            // Descomentar a próxima linha para verificar qual a informação que a exceção tem
            //dd($th, $th->errorInfo);

            if ($th->errorInfo[1] == 1451) {   // 1451 - MySQL Error number for "Cannot delete or update a parent row: a foreign key constraint fails (%s)"

                return redirect()->route('admin.generos')
                    ->with('alert-msg', 'Não foi possível apagar o Genero "' . $oldName . '", porque este genero já está em uso!')
                    ->with('alert-type', 'danger');

            } else {

                return redirect()->route('admin.generos')
                    ->with('alert-msg', 'Não foi possível apagar o Genero "' . $oldName . '". Erro: ' . $th->errorInfo[2])
                    ->with('alert-type', 'danger');
            }
        }
    }
}
