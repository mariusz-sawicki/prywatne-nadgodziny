@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Szczegóły nadgodzin</div>

                <div class="panel-body">
                	<table class="table">
						<tbody>
							<tr>
								<td>Dzien</td>
								<td>{{ $overtime->date_from->format('Y-m-d') }}</td>
							</tr>
							<tr>
								<td>Od</td>
								<td>{{ $overtime->date_from->format('H:i') }}</td>
							</tr>
							<tr>
								<td>Do</td>
								<td>{{ $overtime->date_to->format('H:i') }}</td>
							</tr>
							<tr>
								<td>Czas</td>
								<td>{{ $overtime->date_from->diffInMinutes($overtime->date_to) }}</td>
							</tr>
						</tbody>
                	</table>
                	{!! Form::open(['url'=>url('overtime',[$overtime->id, 'edit']),'method'=>'GET']) !!}
                	<button type="submit" class="btn btn-primary btn-warning">Edytuj</button>	
                	{!! Form::close() !!}
                	{!! Form::open(['url'=>url('overtime',$overtime->id),'method'=>'DELETE']) !!}
                	<button type="submit" class="btn btn-primary btn-error">Usun</button>	
                	{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection