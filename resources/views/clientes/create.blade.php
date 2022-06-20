@extends('layout_admin')
@section('title', 'Novo Cliente' )
@section('content')
    <form method="POST" action="{{route('admin.clientes.store')}}" class="form-group" enctype="multipart/form-data">
        @csrf
        @include('clientes.partials.create-edit')
        <div class="form-group">
            <label for="inputPass">Password</label>
            <input type="text" class="form-control" name="password" id="inputPass" value="{{old('password', $cliente->user->password)}}" >
            @error('password')
                <div class="small text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputConfPass">Confirm Password</label>
            <input type="text" class="form-control" name="confirm_password" id="inputConfPass" value="{{old('email', $cliente->user->confirm_password)}}" >
            @error('confirm_password')
                <div class="small text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputToken">Remember Password</label>
            <input type="checkbox" class="form-control" name="remember_token" id="inputToken" value="{{old('email', $cliente->user->remember_token)}}" >
            @error('remember_token')
                <div class="small text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.clientes.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
