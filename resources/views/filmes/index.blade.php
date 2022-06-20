@extends('layout')

@section('title', 'Filmes')

@section('content')
    <div class="container" style="padding-left: 8rem">
        <h1 style="font-size: 50px">{{ __('FILMES') }}</h1>
        <div class="row text-center h-100 justify-content-center">
            @foreach ($filmes as $filme)
                <div class="col-md-4 text-center my-auto" style="padding-top: 3em">
                    <div class="card card-block d-flex" style="width: 18rem; align-content:stretch">
                        @if ($filme->cartaz_url != '')
                            <img src="{{ asset('public/cartazes/' . $filme->cartaz_url) }}" class="card-img-top"
                                style="max-height: 10em, max-width: 1em" alt="Cartaz">
                        @endif
                        <div class="card-body align-items-center d-flex justify-content-center">
                            <h3 class="card-title">{{ $filme->titulo }}</h3>
                        </div>
                        <a class="btn btn-primary btn-outline"
                            href="{{ route('filmes.show', ['filme' => strtolower($filme->titulo)]) }}">{{ __('INFORMAÇÕES') }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
