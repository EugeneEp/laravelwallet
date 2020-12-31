@extends('layouts.walletPage')

@section('title')

	Профиль

@endsection

@section('content-title')

Профиль

<span>Ваши личные данные</span>

@endsection

@section('content')

	<div class="charge-block">
		<form class="data-form" id="profile_picture">
			@CSRF
			<a href="#" class="t2">Добавить изображение профиля</a>
			<div class="profile_pic" data-file='{{ auth()->user()->id }}'>
				
			</div>
			<div class="file-field">
			    <input type="file" id="file" class="input-file" name="img" accept="image/gif, image/jpeg, image/png">
			    <label for="file" class="btn btn-tertiary js-labelFile">
			    	<span class="js-fileName">Выберете файл</span>
			    </label>
			</div>
			<input type="hidden" name="action" value="profile_picture">
			<input type="hidden" name="method" value="{{ route('user-picture-upload') }}">
			<span style="color: red; display: none;" class="error alert alert-danger"></span>
			<span style="color: green; display: none;" class="alert alert-success success"></span>
			<input type="submit" class="btn-square btn-blue-gradient" value="Загрузить">
		</form>
		<form class="data-form">
			@CSRF
			<a href="#" class="t2">Идентификация кошелька</a>
			<p class="t5">Введите ваши данные для получения идентифицированного кошелька.</p>
			<a href="#">Фамилия Имя Отчество</a>
			<input type="text" required="" name="fullname" value="{{ $data->fullname }}" placeholder="Иванов Иван Иванович" class="form-control">
			<a href="#">Серия номер паспорта</a>
			<input type="text" required="" name="passport" value="{{ $data->passport }}" placeholder="1111 111111" class="form-control">
			<a href="#">Дата выдачи</a>
			<input type="date" required="" name="passportIssuedAt" value="{{ $data->passportIssuedAt }}" class="form-control">

			<input type="hidden" name="action" value="profile">
			<input type="hidden" name="method" value="{{ route('user-profile-identity') }}">

			<span style="color: red; display: none;" class="error alert alert-danger"></span>
			<span style="color: green; display: none;" class="success alert alert-success"></span>
			<input type="submit" class="btn-square btn-blue-gradient" value="Отправить">
		</form>

	</div>

@endsection