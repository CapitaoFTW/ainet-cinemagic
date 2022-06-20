@extends('layout')

@section('title', 'Filmes')

@section('content')
    <div class="container">
        <h1 style="font-size: 50px">Filmes</h1>
        <div class="row text-center h-100 justify-content-center">
            @foreach ($filmes as $filme)
                <div class="col-md-4 text-center my-auto" style="padding-top: 3em">
                    <div class="card card-block d-flex" style="width: 18rem; align-content:stretch">
                        <img src="public/cartazes/{{ $filme->cartaz_url }}" class="card-img-top"
                            style="max-height: 10em, max-width: 1em" alt="Cartaz">
                        <div class="card-body align-items-center d-flex justify-content-center">
                            <h3 class="card-title">{{ $filme->titulo }}</h3>
                        </div>
                        <a class="btn btn-primary btn-outline" href="{{ route('filmes.show', ['filme' => strtolower($filme->titulo)]) }}">SABER MAIS</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
