@extends('layout')

@section('title', 'Filmes em Exibição')

@section('content')
    <div class="container" style="padding-left: 1rem">
        <h1 style="font-size: 50px">FILMES EM EXIBIÇÃO</h1>
        <div class="row mt-5">
            <div class="col-md-12">
                <form method="get" action="{{ route('filmes.index') }}" class="d-flex flex-fill flex-md-row flex-column">
                    <div class="flex-grow-1 pr-0 pr-md-2">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Pesquisar</span>
                                </div>
                                <input type="text" name="nome" value="{{ old('nome', $nome) }}"class="form-control"
                                    placeholder="Título ou Sumário">
                            </div>
                        </div>
                    </div>
                    <div class="pr-0 pr-md-2 text-center">
                        <div class="form-group">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <select class="custom-select" name="genero" id="inputGenero" aria-label="Genero">
                                    <option value="" {{ '' == old('generos', $generos) ? 'selected' : '' }}>Todos os
                                        Géneros</option>
                                    @foreach ($generos as $genero_code => $nome)
                                        <option value={{ $genero_code }}
                                            {{ $genero_code == old('genero', $genero) ? 'selected' : '' }}>
                                            {{ $nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 mb-md-0 text-center">
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-success px-4">Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row text-center justify-content-center">
            @foreach ($filmes as $filme)
                <div class="col-md-4 text-center my-auto" style="padding-top: 3em">
                    <div class="card card-block d-flex" style="align-content:stretch">
                        @isset($filme->cartaz_url)
                            <img src="{{ asset('storage/cartazes/' . $filme->cartaz_url) }}" class="card-img-top"
                                style="max-height: 10em, max-width: 1em" alt="Cartaz">
                        @else
                            <img src="{{ asset('storage/cartazes/343_62c771c155ed0.jpg') }}" class="card-img-top"
                                style="max-height: 10em, max-width: 1em" alt="Cartaz">
                        @endisset
                        <div class="card-body align-items-center d-flex justify-content-center">
                            <h3 class="card-title">{{ $filme->titulo }}</h3>
                        </div>
                        <a class="btn btn-primary btn-outline"
                            href="{{ route('filme.show', ['filme' => strtolower($filme->titulo)]) }}">{{ __('INFORMAÇÕES') }}</a>
                    </div>
                </div>
            @endforeach
            @empty($filmes->items())
                <div class="col-md-12 text-center my-auto" style="padding-top: 9em; padding-bottom: 9em">
                    <div class="card-body align-items-center d-flex justify-content-center">
                        <h3 class="card-title">NÃO HÁ FILMES EM EXIBIÇÃO PARA O QUE DEFINIU</h3>
                    </div>
                </div>
            </div>
        @endempty
    </div>
    </div>
@endsection
