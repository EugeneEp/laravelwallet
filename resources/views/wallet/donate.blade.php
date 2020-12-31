@extends('layouts.walletPage')

@section('title')

	Пожертвования

@endsection

@section('content-title')

Пожертвования

<span>Ваши личные данные</span>

<p>Принимай донаты с любых сервисов и на любые суммы!</p>

@endsection

@section('content')

	<div class="charge-block">
		<form class="data-form">
			@CSRF
			<p class="t5">1. Настройте интеграцию со стриминговыми сервисами</p>
			<div class="charge-images">
				<img src="/images/twitch.png">
				<img src="/images/wasd.png">
				<img src="/images/youtube.png">
			</div>

			<p class="t5">2. Настройте прием пожертвований</p>

			<a href="#">Открыть настройки пожертвований</a>


			<a href="#">Создать ссылку для оплаты <i class="fa fa-info-circle"></i></a>
			<input type="text" name="" class="form-control">

			<a href="#">Создать ссылку для оплаты <i class="fa fa-info-circle"></i></a>

			<a href="#" class="t2">Создать виджет оплаты</a>
			<p class="t5">Виджет - кастоммизированная ссылка на оплату, которая позволяет принимать платежи любым способом без создания собственного сайта.<br>Идеальный вариант для торговли в социальных сетях и мессенджерах.</p>
			<a href="#" class="t2">Получить виджет</a>

			<input type="hidden" name="action" value="donate">
			<input type="hidden" name="method" value="{{ route('wallet-donate') }}">

			<span style="color: red; display: none;" class="error alert alert-danger"></span>
			<input type="submit" class="btn-square btn-blue-gradient" value="Создать">
		</form>
	</div>

@endsection