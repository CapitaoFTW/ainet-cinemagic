@extends('layouts.painel')
@section('title','Alterar Filme' )
@section('content')
    <form method="POST" action="{{route('admin.filmes.update', ['filme' => $filme]) }}" class="form-group">
        @csrf
        @method('PUT')
        @include('filmes.partials.create-edit')
        <input type="hidden" name="filme_abreviatura" value="{{$filme->abreviatura}}">
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.filmes.edit', ['filme' => $filme]) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
