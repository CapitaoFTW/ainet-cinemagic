@extends('layout')

@section('title', 'Filme')

@section('content')
    <div class="container">
        <h1 style="font-size: 50px">{{ $filme->titulo }}</h1>
        <div class="row text-center h-100 justify-content-center">
                <div class="col-md-4 text-center my-auto" style="padding-top: 3em">
                    <div class="card card-block d-flex" style="width: 18rem; align-content:stretch">
                        <img src="storage/cartazes/{{ $filme->cartaz_url }}" class="card-img-top"
                            style="max-height: 10em, max-width: 1em" alt="Cartaz">
                        <div class="card-body align-items-center d-flex justify-content-center">
                            <h3 class="card-title">{{ $filme->titulo }}</h3>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
