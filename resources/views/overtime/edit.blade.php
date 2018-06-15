@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edycja nadgodzin</div>

                <div class="panel-body">
                	{!! Form::model($overtime, ['method'=>'PATCH','class'=>'form-horizontal','action'=>['OvertimeController@update', $overtime->id]]) !!}
                    {!! Form::date('date_date', $overtime->date_from->format('Y-m-d')) !!}
                    {!! Form::time('date_from', $overtime->date_from->format('H:i')) !!}
                	{!! Form::time('date_to', $overtime->date_to->format('H:i')) !!}
                	{!! Form::submit('Zapisz zmiany') !!}
                	{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection