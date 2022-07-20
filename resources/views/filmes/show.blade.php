@extends('layout')

@section('title', 'Filme')

@section('content')

    @if (session('alert-msg'))
        @include('message')
    @endif
    @if ($errors->any())
        @include('errors-message')
    @endif

    <article class="filme-artigo">
        <div class="container w-50">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 style="font-size: 50px">{{ mb_strtoupper($filme->titulo, 'UTF-8') }}</h1>
                </div>
            </div>
            <section class="filme-primeiro-conteudo" style="padding-top: 5em">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2><b>{{ __('SUMÁRIO') }}</b></h2>{{ $filme->sumario }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <br />
                                <h5><b>{{ __('ANO') }}</b>
                                    <div class="ano">
                                        <p class="ano">{{ $filme->ano }}
                                        <p>
                                    </div>
                                    <b>{{ __('GÉNERO') }}</b>
                                    <div class="genero">
                                        <p class="ano">{{ $filme->genero_code }}
                                        <p>
                                    </div>
                                </h5>
                                <br />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @isset($filme->cartaz_url)
                            <img src="{{ asset('storage/cartazes/' . $filme->cartaz_url) }}" style="height: 25rem"
                                alt="Cartaz">
                        @else
                            <img src="{{ asset('storage/cartazes/343_62c771c155ed0.jpg') }}" style="height: 25rem"
                                alt="Cartaz">
                        @endisset
                    </div>
            </section>
        </div>
        @isset($filme->trailer_url)
            <div class="container text-center justify-content-center">
                <div class="row">
                    <div class="col-md-12">
                        <br /><br />
                        <h2><b>{{ __('TRAILER') }}</b></h2>
                    </div>
                </div>
                <section class="filme-segundo-conteudo" style="padding-top: 2em">
                    <div class="row">
                        <div class="col-md-12">
                            <iframe width="640" height="480"
                                src="{{ str_replace('watch?v=', 'embed/', $filme->trailer_url) }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </section>
            </div>
        @endisset
        <div class="container text-center justify-content-center">
            <div class="row">
                <div class="col-md-12">
                    <br /><br />
                    <h2><b>{{ __('SESSÕES') }}</b></h2>
                </div>
            </div>
            <section class="filme-terceiro-conteudo" style="padding-top: 2rem">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Hora</th>
                            <th>Data</th>
                            <th>Sala</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filme->sessoes as $sessao)
                            @if ($sessao->data >= date('Y-m-d') && $sessao->horario_inicio >= date('H:i:s'))
                                <tr>
                                    <td>{{ date('H:i', strtotime($sessao->horario_inicio)) }}</td>
                                    <td>{{ date('j F', strtotime($sessao->data)) }}</td>
                                    <td>{{ $sessao->sala->nome }}</td>
                                    <td>Esgotada</td>
                                    <td class="text-right" style="width:10rem;">
                                        <a href="" class="btn btn-success">Comprar Bilhete</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </article>
@endsection
