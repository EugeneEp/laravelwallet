@extends('layouts.walletPage')

@section('title')
	Мой кошелек
@endsection

@section('content-title')

Мой кошелек

<span>История операций</span>

@endsection

@section('content-form')
<div class="form-block">
	<form class="search-form form-inline">
		@CSRF
		<a href="" class="trans-range" data-range='today'>За сегодня</a>
		<a href="" class="trans-range" data-range='yesterday'>За вчера</a>
		<a href="" class="trans-range" data-range='week'>За неделю</a>

		<div class="input-group">
	    	<div class="input-group-prepend">
	      		<div class="input-group-text">с</div>
	    	</div>
	    	<input type="date" class="form-control" name='from' value="{{ 'test' }}">
	  	</div>

	  	<div class="input-group">
	    	<div class="input-group-prepend">
	      		<div class="input-group-text">по</div>
	    	</div>
	    	<input type="date" class="form-control" name='to' value="{{ 'test' }}">
	  	</div>
	  	<input type="submit" class="btn btn-sm btn-light" value="Поиск">
	  	<a href="{{ route('wallet-index') }}">Сбросить фильтры</a>
	</form>
</div>
@endsection

@section('content')

	<div class="text-left">
		<input type="submit" data-href="{{ route('wallet-index') }}" class="btn btn-dark btn-csv" value="Выгрузить в CSV">
	</div>

	<table class="table">
		<thead>
			<tr>
				<th>Дата</th>
				<th>Тип транзакции</th>
				<th>Отправитель</th>
				<th>Получатель</th>
				<th>Статус</th>
				<th>Сумма</th>
			</tr>
		</thead>
		<tbody>
			 @foreach($data as $t)
				<tr>
					<td>{{ $t->time }}</td>
					<td>{{ $t->movement_type}}</td>
					<td></td>
					<td></td>
					<td>{{ $t->status }}</td>
					<td>{{ $t->amount }}</td>
				</tr>
			 @endforeach
		</tbody>
	</table>

	{{ $data->links("pagination::bootstrap-4") }}

@endsection