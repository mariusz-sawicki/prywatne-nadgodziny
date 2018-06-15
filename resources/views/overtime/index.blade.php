@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nadgodziny</div>

                <div class="panel-body">
                	<table class="table">
                		<thead class="thead-dark">
	                		<tr>
	                			<th scope="col">Lp.</th>
	                			<th scope="col">Dzien</th>
	                			<th scope="col">Od</th>
	                			<th scope="col">Do</th>
	                			<th scope="col">Ile minut?</th>
	                			<th scope="col">Pokaż</th>
	                		</tr>
                		</thead>
						<tbody>
							@foreach ($overtimes as $overtime)
								<tr>
									<th scope="row">{{ $loop->iteration }}</th>
									<td>{{ $overtime->date_from->format('Y-m-d') }}</td>
									<td>{{ $overtime->date_from->format('H:i') }}</td>
									<td>{{ $overtime->date_to->format('H:i') }}</td>
									<td>{{ $overtime->date_from->diffInMinutes($overtime->date_to) }}</td>
									<td><a href="{{ url('overtime', $overtime->id) }}">Pokaż</a></td>
								</tr>
							@endforeach
						</tbody>
                	</table>						
                </div>
                <a class="btn btn-primary btn-warning" href="{{ route('overtime.create') }}">Dodaj nadgodziny</a>
            </div>
        </div>
    </div>
</div>
@endsection