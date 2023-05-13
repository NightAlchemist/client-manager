@extends('layouts.app')

@section('content')
<div class="container">

@if (Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">   
        {{ Session::get('message') }}
    
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <spana aria-hidden="true">&times</spana>
    </button>
</div>
@endif

<a href="{{ url('clients/create') }}" class="btn btn-outline-dark">Registrar nuevo cliente</a>
<br>
<br>

<div class="table-responsive-md">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo Electrónico</th>
                <th scope="col">Tipo de Identificación</th>
                <th scope="col">Número de identificación</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->nombre }}</td>
                <td>{{ $client->apellidos }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->tipo_identificacion }}</td>
                <td>{{ $client->numero_identificacion }}</td>
                <td>
                    
                    <a href="{{ url('/clients/'.$client->id.'/edit') }}" class="btn btn-primary">
                        Editar
                    </a>
                
                | 

                    <form action="{{ url('/clients/'.$client->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-secondary" type="submit" onclick="return confirm('¿Borrar información de cliente?')" value="Borrar">

                    </form>

                </td>                
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $clients->links() !!}
</div>
</div>
@endsection