@extends('layouts.walletPage')

@section('title')

	Переводы

@endsection

@section('content-title')

Переводы

<span>Выберете способ перевода</span>

@endsection

@section('content')

	<div class="transfer-block">

		<form class="data-form">
			@CSRF
			<div>
				<div class="form-group">
					<span>На банковскую карту</span>
					<input type="text" placeholder="Введите номер карты" name="card" class="form-control">
					<input type="number" placeholder="Сумма" name="amount" class="form-control">
				</div>
				<div class="form-group">
					<span>На другой кошелек</span>
					<input type="text" placeholder="Номер кошелька" name="card" class="form-control">
					<input type="number" placeholder="Сумма" name="amount" class="form-control">
				</div>
				<div class="form-group">
					<span>На рассчетный счет</span>
					<input type="text" placeholder="Номер счета" name="card" class="form-control">
					<input type="number" placeholder="Сумма" name="amount" class="form-control">
				</div>
				<div class="form-group">
					<span>Массовые выплаты</span>

					<div class="custom-file">
					    <input type="file" class="custom-file-input" id="inputGroupFile01"
					      aria-describedby="inputGroupFileAddon01">
					    <label class="custom-file-label" for="inputGroupFile01">Выберете CSV файл</label>
					</div>
				</div>
			</div>
			<input type="hidden" name="action" value="transfer">
			<input type="hidden" name="method" value="{{ route('wallet-transfer') }}">
					
			<span style="color: red; display: none;" class="error alert alert-danger"></span>
			<input type="submit" class="btn-square btn-blue-gradient" value="Перевести">

		</form>

	</div>

@endsection