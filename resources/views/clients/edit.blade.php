@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/clients/'.$client->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('clients.form',['mode'=>'Editar datos de'])
</form>

</div>
@endsection