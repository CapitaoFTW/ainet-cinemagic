@extends('layouts.painel')
@section('title', 'Filmes')
@section('content')
    <div class="row mb-3">
        @can('create', App\Models\Filme::class)
            <a href="{{ route('admin.filmes.create') }}" class="btn btn-success" role="button" aria-pressed="true">Novo Filme</a>
        @endcan
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Abreviatura</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Semestres</th>
                <th>ECTS</th>
                <th>Vagas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filmes as $filme)
                <tr>
                    <td>{{ $filme->abreviatura }}</td>
                    <td>{{ $filme->nome }}</td>
                    <td>{{ $filme->tipo }}</td>
                    <td>{{ $filme->semestres }}</td>
                    <td>{{ $filme->ECTS }}</td>
                    <td>{{ $filme->vagas }}</td>
                    <td nowrap>
                        @can('view', $filme)
                            <a href="{{ route('admin.filmes.edit', ['filme' => $filme]) }}" class="btn btn-primary btn-sm"
                                role="button" aria-pressed="true"><i class="fa fa-pen"></i></a>
                        @else
                            <span class="btn btn-secondary btn-sm disabled"><i class="fa fa-pen"></i></span>
                        @endcan
                        @can('delete', $filme)
                        <form action="{{ route('admin.filmes.destroy', ['filme' => $filme]) }}" method="POST"
                            class="d-inline" onsubmit="return confirm('Tem a certeza que deseja apagar o registo');">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </form>
                        @else
                        <span class="btn btn-secondary btn-sm disabled"><i class="fa fa-trash"></i></span>
                    @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
