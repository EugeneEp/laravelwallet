<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,700,800&display=swap" rel="stylesheet">
    <title>
      
    @yield('title') | Wallet

    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
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
		    <ul class="navbar-nav mr-auto">
				
		    </ul>
		    <ul class="navbar-nav navbar-nav-wallet">
		    	<li class="nav-item dropdown">
			        <a class="nav-link wallet-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          <div class="nav-icons">
			          	<i class="fa fa-chevron-down"></i>
			          	<i class="fa fa-wallet"></i>
			          </div>
			          <div class="nav-info">
			          	<span class="info-header">Счет Wallet</span>
			          	<span>0 р</span>
			          </div>
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="#">Пока ничего</a>
			          <a class="dropdown-item" href="#">Пока ничего нет</a>
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" href="#">Тут пока ничего нет</a>
			        </div>
			    </li>
		    </ul>
	  	</div>
	</nav>

	<div class="container-custom">
		<div class="row">
			<div class="col-2 left-menu">
				<ul class="navbar-nav navbar-header">
			        <li class="nav-item dropdown navbar-header">
			        	<div class="profile_pic" data-file='{{ auth()->user()->id }}'>
			        		
			        	</div>
			        	<h7>+ {{ auth()->user()->phone }}</h7>
			        </li>
                </ul>
                <ul class="navbar-nav navbar-menu-profile">
                	<li class="nav-item dropdown">
			        	<a href="{{ route('wallet-index') }}">
			        		Мой кошелек
			        	</a>
			        </li>
			        <li class="nav-item dropdown">
			        	<a href="{{ route('user-profile') }}">
			        		Профиль
			        	</a>
			        </li>
			        <li class="nav-item dropdown">
			        	<a href="{{ route('wallet-charge') }}">
			        		Пополнить
			        	</a>
			        </li>
			        <li class="nav-item dropdown">
			        	<a href="{{ route('wallet-transfer') }}">
			        		Переводы
			        	</a>
			        </li>
			        <li class="nav-item dropdown">
			        	<a href="{{ route('wallet-moneybank') }}">
			        		Сбор средств
			        	</a>
			        </li>
			        <li class="nav-item dropdown">
			        	<a href="{{ route('wallet-donate') }}">
			        		Пожертвования
			        	</a>
			        </li>
			        <li class="nav-item dropdown">
			        	<a href="{{ route('wallet-partner') }}">
			        		Кабинет партнера
			        	</a>
			        </li>
					<li class="nav-item dropdown">
			        	<a href="{{ route('logout') }}">
			        		<strong>Выйти</strong>
			        	</a>
			        </li>
                </ul>
			</div>
			<div class="col-10">
				<div class="row">
					<div class="col-lg-2 col-md-3">
						<h5 class="inner-title-profile">
							@yield('content-title')
						</h5>
					</div>
					<div class="col-lg-10 col-md-9">
							@yield('content-form')
					</div>
				</div>
				@yield('content')
			</div>
		</div>
	</div>

    <script type="text/javascript" src="/js/app.js"></script>
</main>
</body>
</html>