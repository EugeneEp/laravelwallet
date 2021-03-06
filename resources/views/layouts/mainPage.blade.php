<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>
      
    @yield('title') | Wallet

    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <style type="text/css">
    	.action-btn{
    		color: #007bff;
    		margin: 5px;
    		cursor: pointer;
    	}
    	.action-btn:hover{
    		color: #0056b3;
    	}
    </style>
</head>
<body>
<main>
	<nav class="navbar navbar-expand-lg navbar-light bg-white row header">
		<div class="col-2 header-brand">
	  		<a class="navbar-brand" href="{{ route('index') }}">Wallet</a>
	  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  	</div>
	  	<div class="collapse navbar-collapse col-10" id="navbarSupportedContent">
		    <ul class="navbar-nav">
		    	<li class="nav-item">
          			<a class="nav-link" href="{{ route('info', 'start-business') }}">Бизнесс на старте</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="{{ route('info', 'stream') }}">Стриминг</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="{{ route('info', 'business') }}">Инфобизнес</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="{{ route('info', 'gaming') }}">Игровые биржи</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link" href="{{ route('info', 'events') }}">Частные мероприятия, ивенты</a>
        		</li>
		    </ul>
	  	</div>
	</nav>
	<div class="container-custom">
		<div class="row">
			<div class="col-2 left-menu">
				<ul class="navbar-nav navbar-header">
			        <li class="nav-item dropdown">
			        	@auth
			        		<a href="{{ route('wallet-index') }}">
			        			<div class="profile_pic" data-file='{{ auth()->user()->id }}'>
			        				
			        			</div>
			        		</a>
			        		<a href="{{ route('logout') }}">
			        			Выйти
			        		</a>
			        	@endauth
			        	@guest
			        		<a href="#modalSignUp" data-toggle="modal" data-target="#modalSignUp">
			        			<div class="profile_pic">
			        				<i class="fa fa-user"></i>
			        			</div>
			        			Войти
			        		</a>
			        	@endguest
			        </li>
                </ul>
                <ul class="navbar-nav navbar-menu">
                	<li class="nav-item dropdown">
			        	<a href="{{ route('info', 'capabilities') }}">
			        		Возможности
			        	</a>
			        </li>
			        <li class="nav-item dropdown">
			        	<a href="{{ route('info', 'about') }}">
			        		О нас
			        	</a>
			        </li>
			        <li class="nav-item dropdown">
			        	<a href="{{ route('info', 'contacts') }}">
			        		Контакты
			        	</a>
			        </li>
                </ul>
			</div>
			<div class="col-10">
				@yield('content')
			</div>
		</div>
	</div>

	<div class="modal fade bd-example-modal-lg" id="modalSignUp" tabindex="-1" role="dialog" aria-labelledby="modalSignUp" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content row">
	    	<div class="col-5">
	    		<div class="reg-btns">
	    			<input type="button" class="btn-tog btn-blue" data-action='reg' value="Регистрация">
	    			<input type="button" id="btn-tog-log" class="btn-tog btn-grey" data-action='log' value="Авторизация">
	    		</div>
	    		<div class="modal-block info-block">
		    		<div class="reg-modal-header">Wallet</div>
		    		<div class="reg-modal-desc">Открой <br>для себя безграничные возможности <span>Wallet</span></div>
		    		<p class="reg-modal-info">Пройдите первичную регистрацию, чтобы открыть функционал кошелька <span>Basic</span></p>
		    		<div class="reg-modal-lock">
		    			<i class="fa fa-lock"></i>
		    		</div>
		    	</div>
	    	</div>
	    	<div class="modal-block col-7">
	    		<div id="reg-tog" class="modal-block-form">
	    			<div class="w3-light-grey w3-round">
    					<div class="w3-container w3-just-blue w3-round" style="width:25%">
    					25%</div>
  					</div>
		    		<div class="row" id="getSms">
		    			@CSRF
		    			<h3 class="enter-phone">Укажите свой номер телефона</h3>
		    			<h3 class="enter-code">На ваш номер было отправлено смс с кодом (1111)</h3>
		    			<div class="enter-phone enter-block">
	                		<input type="text" name="phone" id="phone" value="" class="form-control" placeholder="Номер телефона" maxlength="16">
	                		<span>У вас уже есть личный кабинет? </span><a onclick="document.getElementById('btn-tog-log').click(); return false;" value="Авторизация">Войти</a>
	                	</div>
	                	<input type="hidden" name="type" value="reg">

	                	<div class="enter-code enter-block">
							<div class="divOuter">
							  <div class="divInner">
							    <input class="partitioned " type="text" name="code" maxlength="4" onKeyPress="if(this.value.length==4) return false;">
							  </div>
							</div>
						</div>
						<span style="color: red; display: none;" class="error alert alert-danger"></span>
	                	<input type="hidden" name="action" value="/sms/send">
		                <div class="col-12">
		                	<input type="button" class="btn-square btn-blue-gradient" value="Далее">
		                </div>
		            </div>
		            <form class="row data-form" id='reg' style="display: none;">
		            	@CSRF
		            	<h3>Отлично! Теперь придумайте пароль, для вашей учетной записи</h3>

		            	<div class="enter-block">
		            		<input type="password" required="" name="password" class="form-control" placeholder="Придумайте пароль">
		            		<input type="password" required="" name="confirm" class="form-control" placeholder="Повторите парль">
		            	</div>

		            	<input type="hidden" name="phone" value="">
		            	<input type="hidden" name="action" value="reg">
						<input type="hidden" name="method" value="{{ route('registration') }}">
						<span style="color: red; display: none;" class="error alert alert-danger"></span>
		                <div class="col-12">
		                	<input type="submit" class="btn-square btn-blue-gradient" value="Далее">
		                </div>
		            </form>
		            <div class="row" id='finish' style="display: none;">
		            <div class="enter-block">
		            	<h3 class="enter-phone">Спасбо! Вы прошли первичную регистрацию</h3>
		            </div>
		            	<div class="col-12">
		                	<a href="{{ route('wallet-index') }}" class="btn-square btn-blue-gradient">Перейти в личный кабинет</a>
		                </div>
		            </div>
		        </div>
		        <div id="log-tog" class="modal-block-form">
		        	<form class="row data-form" id='log'>
		        		@CSRF
		        		<h3>Авторизуйтесь с помощью номера мобильного телефона</h3>

		        		<div class="enter-block">
							<input type="text" name="phone" value="" class="form-control" placeholder="Номер телефона" maxlength="16">
			            	<input type="password" required="" name="password" class="form-control" placeholder="Пароль">
			            </div>
		            	<input type="hidden" name="action" value="log">
						<input type="hidden" name="method" value="{{ route('login' )}}">
						<span style="color: red; display: none;" class="error alert alert-danger"></span>
		                <div class="col-12">
		                	<input type="submit" class="btn-square btn-blue-gradient" value="Войти">
		                </div>
		            </form>
		        </div>
		    </div>
	    </div>
	  </div>
	</div>
    <script type="text/javascript" src="/js/app.js"></script>
</main>
</body>
</html>