@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lista</div>

                <div class="panel-body">
                	<table class="table">
                		<thead class="thead-dark">
                			<tr>
                				<th colspan="5">Wyjścia prywatne</th>
                				<th colspan="1">Nadgodziny</th>
                				<th>Do nadrobienia</th>
                			</tr>
	                		<tr>
	                			<th scope="col">Lp.</th>
	                			<th scope="col">Dzien</th>
	                			<th scope="col">Od</th>
	                			<th scope="col">Do</th>
	                			<th scope="col">Ile minut?</th>
	                			<th scope="col"></th>
	                			<th scope="col"></th>
	                			<!--<th scope="col">Nadgodziny</th>-->
	                			<!--<th scope="col">Pokaż</th>-->
	                		</tr>
                		</thead>
						<tbody>
							@php
							$prywatne=0;	
							@endphp
							@foreach ($freetimes as $freetime)
								<tr>
									<th scope="row">{{ $loop->iteration }}</th>
									<td>{{ $freetime->date_from->format('Y-m-d') }}</td>
									<td>{{ $freetime->date_from->format('H:i') }}</td>
									<td>{{ $freetime->date_to->format('H:i') }}</td>
									<td>{{ $freetime->date_from->diffInMinutes($freetime->date_to) }}</td>
									@php
										$prywatne+=$freetime->date_from->diffInMinutes($freetime->date_to);
									@endphp
									<td>
					                	<table class="table">
				                		<thead class="thead-dark">
				                			<th scope="col">Lp.</th>
				                			<th scope="col">Dzien</th>
				                			<!--<th scope="col">Od</th>
				                			<th scope="col">Do</th>-->
				                			<th scope="col">Ile minut?</th>
										</thead>
										<tbody>
											@foreach ($overtimes as $overtime)
											<tr style="background-color:silver;">
											@if($overtime->date_from->diffInMinutes($overtime->date_to)>=$freetime->date_from->diffInMinutes($freetime->date_to))
													<th scope="row">{{ $loop->iteration }}</th>
													<td>{{ $overtime->date_from->format('Y-m-d') }}</td>
													<td>{{ $freetime->date_from->diffInMinutes($freetime->date_to) }}</td>
													<!--<td><a href="{{ url('overtime', $overtime->id) }}">Prywatne</a></td>-->
												@php
													$prywatne-=$freetime->date_from->diffInMinutes($freetime->date_to);
													$overtime->date_to=$overtime->date_to->subMinutes($freetime->date_from->diffInMinutes($freetime->date_to));
													$freetime->date_to=$freetime->date_from;
												@endphp
													<!--<td>{{ $overtime->date_to }}</td>-->
													@break
											@elseif($overtime->date_from->diffInMinutes($overtime->date_to)==0)
												@continue
											@else
													<th scope="row">{{ $loop->iteration }}</th>
													<td>{{ $overtime->date_from->format('Y-m-d') }}</td>
													<td>{{ $overtime->date_from->diffInMinutes($overtime->date_to) }}</td>
												@php
													//->subMinutes($overtime->date_from->diffInMinutes($overtime->date_to));
													$prywatne-=$overtime->date_from->diffInMinutes($overtime->date_to);
													$freetime->date_to=$freetime->date_to->subMinutes($overtime->date_from->diffInMinutes($overtime->date_to));
													$overtime->date_to=$overtime->date_from;
													//$prywatne+=$freetime->date_from->diffInMinutes($freetime->date_to);
												@endphp

											@endif
											</tr>
											@endforeach			
										</tbody>
										</table>
									</td>
									<!--<td><a href="{{ url('freetime', $freetime->id) }}">Nadgodziny</a></td>-->
									<td>
										@php
											//echo $overtime->date_from->diffInHours($overtime->date_from->addMinutes($prywatne)).'<br>';
											@endphp
										@if($prywatne>0)
											@if ($overtime->date_from->diffInHours($overtime->date_from->addMinutes($prywatne))>0)
												{{ $overtime->date_from->diffInHours($overtime->date_from->addMinutes($prywatne)) }}
												godz. <br>
											@endif
											@if ($overtime->date_from->diffInMinutes($overtime->date_from->addMinutes($prywatne)) - (60 * $overtime->date_from->diffInHours($overtime->date_from->addMinutes($prywatne)))>0)
											{{ $overtime->date_from->diffInMinutes($overtime->date_from->addMinutes($prywatne)) - (60 * $overtime->date_from->diffInHours($overtime->date_from->addMinutes($prywatne))) }}
												min.
											@endif
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
                	</table>						
                </div>
            </div>
        </div>
    </div>
</div>
@endsection