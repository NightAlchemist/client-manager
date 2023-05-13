<h1>{{ $mode }} cliente</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<div class="form-group">
<label for="Nombre">Nombre</label>
<input type="text" class="form-control" name="Nombre" value="{{ isset($client->nombre)?$client->nombre:old('Nombre') }}" id="Nombre" >
</div>

<div class="form-group">
<label for="Apellidos">Apellidos</label>
<input type="text"  class="form-control" name="Apellidos" value="{{ isset($client->apellidos)?$client->apellidos:old('Apellidos') }}" id="Apellidos" >
</div>

<div class="form-group">
<label for="Email">Correo Electrónico</label>
<input type="email" class="form-control" name="Email" value="{{ isset($client->email)?$client->email:old('Email') }}" id="Email" >
</div>

<div class="form-group">
    <label for="Tipo_Identificacion">Tipo de Identificación</label>
    <select class="form-control" name="Tipo_Identificacion" id="Tipo_Identificacion">
        <option value="CC" {{ (isset($client->tipo_identificacion) && $client->tipo_identificacion == 'CC') ? 'selected' : '' }}>CC</option>
        <option value="CE" {{ (isset($client->tipo_identificacion) && $client->tipo_identificacion == 'CE') ? 'selected' : '' }}>CE</option>
        <option value="Otro" {{ (isset($client->tipo_identificacion) && $client->tipo_identificacion == 'Otro') ? 'selected' : '' }}>Otro</option>
    </select>
</div>

<div class="form-group">
<label for="Numero_Identificacion">Número de Identificación</label>
<input type="integer" class="form-control" name="Numero_Identificacion" value="{{ isset($client->numero_identificacion)?$client->numero_identificacion:old('Numero_Identificacion') }}" id="Numero_Identificacion" >
</div>
<br>

<input class="btn btn-primary" type="submit" value="{{ $mode }} cliente">
|
<a href="{{ url('clients/') }}" class="btn btn-secondary">Volver</a>