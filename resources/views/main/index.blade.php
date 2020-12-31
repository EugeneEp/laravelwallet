@extends('layouts.mainPage')

@section('title')

	Главная страница

@endsection

@section('content')

<div class="index-page">
	
	<h1>Wallet</h1>

	<h4>Электронный кошелек нового<br>поколения</h4>

	<p>
		Сервис, который выгоден каждому!<br>
		- Продажи в социальных сетях<br>
		- Продажи в мессенджерах<br>
		- Оплата услуг<br>
		- Гейминг<br>
		- Массовые выплаты<br>
	</p>
	@guest
		<input type="button" class="btn-circle btn-blue-gradient" href="#modalSignUp" data-toggle="modal" data-target="#modalSignUp" value="Регистрация">
	@endguest
</div>

@endsection