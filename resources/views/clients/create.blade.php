@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/clients') }}" method="post" enctype="multipart/form-data">
@csrf
@include('clients.form',['mode'=>'Crear nuevo'])


</form>
</div>
@endsection