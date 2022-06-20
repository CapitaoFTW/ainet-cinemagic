<div class="form-group">
    <label for="inputNome">Nome</label>
    <input type="text" class="form-control" name="name" id="inputNome" value="{{old('name', $cliente->user->name)}}" >
    @error('name')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="text" class="form-control" name="email" id="inputEmail" value="{{old('email', $cliente->user->email)}}" >
    @error('email')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputTipo">Tipo</label>
    <input type="text" class="form-control" name="tipo" id="inputTipo" value="{{old('tipo', $cliente->tipo)}}" >
    @error('tipo')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputFoto">Url da Foto</label>
    <input type="text" class="form-control" name="foto_url" id="inputFoto">
    @error('foto_url')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputNif">NIF</label>
    <input type="text" class="form-control" name="nif" id="inputNif">
    @error('nif')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputTP">Tipo de Pagamento</label>
    <input type="text" class="form-control" name="tipo_pagamento" id="inputTP">
    @error('tipo_pagamento')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputRP">Referência de Pagamento</label>
    <input type="text" class="form-control" name="ref_pagamento" id="inputRP">
    @error('ref_pagamento')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
