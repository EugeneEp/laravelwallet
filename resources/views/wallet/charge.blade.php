@extends('layouts.walletPage')

@section('title')

	Пополнение

@endsection

@section('content-title')

	Пополнить

	<span>Выберете способ пополнения</span>

@endsection

@section('content')

	<div class="charge-block">
		<form class="data-form">
			@CSRF
			<a href="#">Банковская карта</a>
			<a href="#">Создать ссылку для оплаты <i class="fa fa-info-circle"></i></a>
			<input type="text" name="" class="form-control">
			<a href="#" class="t2">Создать виджет оплаты</a>
			<p class="t5">Виджет - кастоммизированная ссылка на оплату, которая позволяет принимать платежи любым способом без создания собственного сайта.<br>Идеальный вариант для торговли в социальных сетях и мессенджерах.</p>
			<a href="#" class="t2">Получить виджет</a>

			<input type="hidden" name="action" value="charge">
			<input type="hidden" name="method" value="{{ route('wallet-charge') }}">

			<span style="color: red; display: none;" class="error alert alert-danger"></span>
			<input type="submit" class="btn-square btn-blue-gradient" value="Создать">
		</form>

	</div>

@endsection