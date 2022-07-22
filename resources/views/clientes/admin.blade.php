@extends('layouts.painel')
@section('title','Clientes' )
@section('content')
<div class="row mb-3">
    <div class="col-3">
        @can('create', App\Models\Cliente::class)
            <a  href="{{route('admin.clientes.create')}}" class="btn btn-success" role="button" aria-pressed="true">Novo Cliente</a>
        @endcan
    </div>
</div>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>E-mail</th>
                <th>Nome</th>
                <th>Foto</th>
                <th>NIF</th>
                <th>Tipo de Pagamento</th>
                <th>Bloqueado</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>
                        <img src="{{$cliente->user->foto_url ? asset('storage/fotos/' . $cliente->user->foto_url) : asset('img/default_img.png') }}" alt="Foto do cliente"  class="img-profile rounded-circle" style="width:40px;height:40px">
                    </td>
                    <td>{{$cliente->nif}}</td>
                    <td>{{$cliente->user->name}}</td>
                    <td>
                        @can('view', $cliente)
                            <a href="{{route('admin.clientes.edit', ['cliente' => $cliente])}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Alterar</a>
                        @endcan
                    </td>
                    <td>
                        @can('delete', $cliente)
                            <form action="{{route('admin.clientes.destroy', ['cliente' => $cliente])}}"" method="POST">
                                @csrf
                                @method("DELETE")
                                <input type="submit" class="btn btn-danger btn-sm" value="Apagar">
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clientes->withQueryString()->links() }}
@endsection

