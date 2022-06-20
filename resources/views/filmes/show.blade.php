@extends('layout')

@section('title', 'Filme')

@section('content')
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
                    @if ($filme->cartaz_url == '')
                        <div class="col-md-10">
                    @endif
                    @if ($filme->cartaz_url != '')
                        <div class="col-md-4">
                    @endif
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

                @if ($filme->cartaz_url != '')
                    <div class="col-md-6">
                        <img src="{{ asset('public/cartazes/' . $filme->cartaz_url) }}" style="height: 25rem"
                            alt="Cartaz">
                    </div>
                @endif
                </>
            </section>
        </div>
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
    </article>
@endsection
