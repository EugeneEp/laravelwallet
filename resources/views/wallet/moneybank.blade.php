@extends('layouts.walletPage')

@section('title')

	Сбор средств

@endsection

@section('content-title')

Сбор средств

<span>Запуск совместного сбора средств</span>

<p>Запусти совместный сбор средств на любые цели</p>

@endsection

@section('content')

	<div class="charge-block">
		<form class="data-form">
			@CSRF
			<input type="text" name="title" placeholder="Название" class="form-control">
			<input type="text" name="target" placeholder="Цель сбора" class="form-control">
			<input type="number" name="" placeholder="Сумма сбора" class="form-control">
			<a href="#">Создать ссылку для оплаты <i class="fa fa-info-circle"></i></a>
			<input type="text" name="" class="form-control">
			<a href="#" class="t2">Создать виджет оплаты</a>
			<p class="t5">Виджет - кастоммизированная ссылка на оплату, которая позволяет принимать платежи любым способом без создания собственного сайта.<br>Идеальный вариант для торговли в социальных сетях и мессенджерах.</p>
			<a href="#" class="t2">Получить виджет</a>

			<input type="hidden" name="action" value="moneybank">
			<input type="hidden" name="method" value="{{ route('wallet-moneybank') }}">

			<span style="color: red; display: none;" class="error alert alert-danger"></span>
			<input type="submit" class="btn-square btn-blue-gradient" value="Создать">
		</form>
	</div>

@endsection