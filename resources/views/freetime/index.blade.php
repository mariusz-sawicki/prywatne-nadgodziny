@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Wyjścia prywatne</div>

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
							@foreach ($freetimes as $freetime)
								<tr>
									<th scope="row">{{ $loop->iteration }}</th>
									<td>{{ $freetime->date_from->format('Y-m-d') }}</td>
									<td>{{ $freetime->date_from->format('H:i') }}</td>
									<td>{{ $freetime->date_to->format('H:i') }}</td>
									<td>{{ $freetime->date_from->diffInMinutes($freetime->date_to) }}</td>
									<td><a href="{{ url('freetime', $freetime->id) }}">Pokaż</a></td>
								</tr>
							@endforeach
						</tbody>
                	</table>						
                </div>
                <a class="btn btn-primary btn-warning" href="{{ route('freetime.create') }}">Dodaj wyjście prywatne</a>
            </div>
        </div>
    </div>
</div>
@endsection