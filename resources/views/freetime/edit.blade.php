@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edycja wyjść prywatnych</div>

                <div class="panel-body">
                	{!! Form::model($freetime, ['method'=>'PATCH','class'=>'form-horizontal','action'=>['FreetimeController@update', $freetime->id]]) !!}
                	{!! Form::text('date_from') !!}
                	{!! Form::text('date_to') !!}
                	{!! Form::submit('Zapisz zmiany') !!}
                	{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection