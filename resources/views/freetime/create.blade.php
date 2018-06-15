@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tworzenie wyjścia prywatnego</div>

                <div class="panel-body">
                	{!! Form::open(['method'=>'POST','class'=>'form-horizontal','action'=>['FreetimeController@store']]) !!}
                	{!! Form::datetime('date_from') !!}
                	{!! Form::datetime('date_to') !!}
                	{!! Form::submit('Zapisz zmiany') !!}
                	{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection