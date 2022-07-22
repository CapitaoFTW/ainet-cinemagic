@extends('layouts.app')

@section('title', 'Alterar Senha')

@section('content')
    <div class="container">

        @if (session('alert-msg'))
            @include('message')
        @endif
        @error('old_password')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @else
            @if ($errors->any())
                @include('errors-message')
            @endif
        @enderror


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Alterar Senha</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('change.password') }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="old_password" class="col-md-4 col-form-label text-md-right">Senha Antiga</label>

                                <div class="col-md-6">
                                    <input id="old_password" type="password"
                                        class="form-control" name="old_password"
                                        autocomplete="old_password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Nova Senha</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Nova
                                    Senha</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password"
                                        class="form-control
                                        @error('password_confirm') is-invalid @enderror"
                                        name="password_confirm" required autocomplete="new-password">

                                    @error('password_confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Alterar Senha
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
