<div class="form-group">
    <label for="inputAbr">Abreviatura</label>
    <input type="text" class="form-control" name="abreviatura" id="inputAbr" value="{{old('abreviatura', $filme->abreviatura)}}" >
    @error('abreviatura')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputNome">Nome</label>
    <input type="text" class="form-control" name="nome" id="inputNome" value="{{old('nome', $filme->nome)}}" >
    @error('nome')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputTipo">Tipo de Filme</label>
    <select class="form-control" name="tipo" id="inputTipo">
        <option {{old('tipo', $filme->tipo) == 'Licenciatura' ? 'selected' : ''}}>Licenciatura</option>
        <option {{old('tipo', $filme->tipo) == 'Mestrado' ? 'selected' : ''}}>Mestrado</option>
        <option {{old('tipo', $filme->tipo) == 'Filme Técnico Superior Profissional' ? 'selected' : ''}}>Filme Técnico Superior Profissional</option>
    </select>
    @error('tipo')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputSemestres">Semestres</label>
    <input type="text" class="form-control" name="semestres" id="inputSemestres" value="{{old('semestres', $filme->semestres)}}">
    @error('semestres')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputECTS">ECTS</label>
    <input type="text" class="form-control" name="ECTS" id="inputECTS" value="{{old('ECTS', $filme->ECTS)}}">
    @error('ECTS')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputVagas">Vagas</label>
    <input type="text" class="form-control" name="vagas" id="inputVagas" value="{{old('vagas', $filme->vagas)}}">
    @error('vagas')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputContato">Contato</label>
    <input type="text" class="form-control" name="contato" id="inputContato" value="{{old('contato', $filme->contato)}}">
    @error('contato')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="inputObjetivos">Objetivos</label>
    <textarea class="form-control" name="objetivos" id="inputObjetivos" rows=10>{{old('objetivos', $filme->objetivos)}}</textarea>
    @error('objetivos')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
