<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">

    <title>My Digital Stickers  - @yield('title')</title>

    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ url('css/animate.css') }}" rel="stylesheet"> 
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        @if(!isset($menu))
                            <?php
                                $nome = app(\App\Http\Controllers\HomeController::class)->telasLiberadas(app('request')) ;
                            ?>
                        @else
                            <?php $nome = $menu; ?>
                        @endif
                        <img alt="image" class="rounded-circle" src="img/profile_small.jpg"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">{{ $nome[0]->UsuarioNome }}</span>
                            <span class="text-muted text-xs block">{{ $nome[0]->Perfil }}<b class="caret"></b></span>
                            @if($nome[0]->Escola)
                                <span class="text-muted text-xs block">{{ $nome[0]->Escola }}<b class="caret"></b></span>
                            @endif
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        
                    </div>
                </li>
                @if(!isset($menu))
                    <?php
                        $menu = app(\App\Http\Controllers\HomeController::class)->telasLiberadas(app('request')) ;
                    ?>
                @endif
                @foreach ( $menu as $menuItem )
                    @if('rede' == $menuItem->Tela)
                        <li id="rede">
                            <a href="{{ route('rede.list') }}"><i class="fa fa-code-fork"></i> <span class="nav-label">Cadastro de rede</span></a>
                        </li>
                    @endif
                    @if('perfil' == $menuItem->Tela)
                        <li id="perfil">
                            <a href="{{ route('perfil.list') }}"><i class="fa fa-id-card"></i> <span class="nav-label">Cadastro de perfil</span></a>
                        </li>
                    @endif
                    @if('informativoacesso' == $menuItem->Tela)
                        <li id="informativoacesso">
                            <a href="{{ route('informativoacesso.list') }}"><i class="fa fa-plug"></i> <span class="nav-label">Cadastro informativo de acesso</span></a>
                        </li>
                    @endif
                    @if('tela' == $menuItem->Tela)
                        <li id="tela">
                            <a href="{{ route('tela.list') }}"><i class="fa fa-window-maximize"></i> <span class="nav-label">Cadastro de tela</span></a>
                        </li>
                    @endif
                    @if('perfiltela' == $menuItem->Tela)
                        <li id="perfiltela">
                            <a href="{{ route('perfiltela.list') }}"><i class="fa fa-window-restore"></i> <span class="nav-label">Associar perfil x tela</span></a>
                        </li>
                    @endif
                    @if('evento' == $menuItem->Tela)
                        <li id="evento">
                            <a href="{{ route('evento.list') }}"><i class="fa fa-twitch"></i> <span class="nav-label">Cadastro de evento</span></a>
                        </li>
                    @endif
                    @if('traducao' == $menuItem->Tela)
                        <li id="traducao">
                            <a href="{{ route('traducao.list') }}"><i class="fa fa-arrows-h"></i> <span class="nav-label">Tabela para tradução de idiomas</span></a>
                        </li>
                    @endif
                    @if('usuarioescolainformativoacesso' == $menuItem->Tela)
                        <li id="usuarioescolainformativoacesso">
                            <a href="{{ route('usuarioescolainformativoacesso.list') }}"><i class="fa fa-user-circle"></i> <span class="nav-label">Log informativo de acesso</span></a>
                        </li>
                    @endif
                    @if('escola' == $menuItem->Tela)
                        <li id="escola">
                            <a href="{{ route('escola.list') }}"><i class="fa fa-building"></i> <span class="nav-label">Cadastro de escola</span></a>
                        </li>
                    @endif
                    @if('eventoescola' == $menuItem->Tela)
                        <li id="eventoescola">
                            <a href="{{ route('eventoescola.list') }}"><i class="fa fa-address-book"></i> <span class="nav-label">Cadastro de eventos da escola</span></a>
                        </li>
                    @endif
                    @if('usuario' == $menuItem->Tela)
                        <li id="usuario">
                            <a href="{{ route('usuario.list') }}"><i class="fa fa-user-o"></i> <span class="nav-label">Cadastro de usuário</span></a>
                        </li>
                    @endif
                    @if('usuarioescola' == $menuItem->Tela)
                        <li id="usuarioescola">
                            <a href="{{ route('usuarioescola.list') }}"><i class="fa fa-user-circle-o"></i> <span class="nav-label">Listar usuário por escola</span></a>
                        </li>
                    @endif
                    @if('ponto' == $menuItem->Tela)
                        <li id="ponto">
                            <a href="{{ route('ponto.list') }}"><i class="fa fa-eercast"></i> <span class="nav-label">Ajustar pontos da escola</span></a>
                        </li>
                    @endif
                    @if('escolacarteira' == $menuItem->Tela)
                        <li id="escolacarteira">
                            <a href="{{ route('escolacarteira.index') }}"><i class="fa fa-money"></i> <span class="nav-label">Extrato da escola</span></a>
                        </li>
                    @endif
                    @if('alunocompra' == $menuItem->Tela)
                        <li id="alunocompra">
                            <a href="{{ route('alunocompra.list') }}"><i class="fa fa-drivers-license"></i> <span class="nav-label">Compra</span></a>
                        </li>
                    @endif
                    @if('carteira' == $menuItem->Tela)
                        <li id="carteira">
                            <a href="{{ route('carteira.index') }}"><i class="fa fa-money"></i> <span class="nav-label">Extrato do aluno</span></a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </nav>
        <div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom">
				<!-- nav topo-->
				<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
					<div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
						<form role="search" class="navbar-form-custom" action="search_results.html">
							<div class="form-group" style="display: none">
								<input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
							</div>
						</form>
					</div>
					<ul class="nav navbar-top-links navbar-right">
						<li>
							<span class="m-r-sm text-muted welcome-message"></span>
						</li>
                        <li class="dropdown">
							<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" style="display: none">
								<i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
							</a>
							<ul class="dropdown-menu dropdown-messages">
								<li>
									<div class="dropdown-messages-box">
										<a class="dropdown-item float-left" href="profile.html">
											<img alt="image" class="rounded-circle" src="img/a7.jpg">
										</a>
										<div class="media-body">
											<small class="float-right">46h ago</small>
											<strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
											<small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
										</div>
									</div>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<div class="text-center link-block">
										<a href="mailbox.html" class="dropdown-item">
											<i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
										</a>
									</div>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" style="display: none">
								<i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
							</a>
							<ul class="dropdown-menu dropdown-alerts">
								<li>
									<a href="mailbox.html" class="dropdown-item">
										<div>
											<i class="fa fa-envelope fa-fw"></i> You have 16 messages
											<span class="float-right text-muted small">4 minutes ago</span>
										</div>
									</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<div class="text-center link-block">
										<a href="notifications.html" class="dropdown-item">
											<strong>See All Alerts</strong>
											<i class="fa fa-angle-right"></i>
										</a>
									</div>
								</li>
							</ul>
						</li>


						<li>
							<a href="/logout    ">
								<i class="fa fa-sign-out"></i> Log out
							</a>
						</li>
					</ul>

				</nav>
				<!-- fim nav topo-->
			</div>
			
			<!-- breadcrumb -->
            @section('breadcrumb')
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Buttons</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a>UI Elements</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <strong>Buttons</strong>
                            </li>
                        </ol>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
            @show
            
			<!-- fim breadcrumb -->
        <div class="row wrapper wrapper-content animated fadeInRight">
          <!-- content -->
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content p-md">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @section('content')
                            <h1> Teste 1234</h1>
                        @show
                    </div>
                </div>
            </div>
		  <!-- fcontent -->
        </div>
        <div class="footer">
            <div class="float-right">

            </div>

        </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.js') }}"></script>
    <script src="{{ url('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ url('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ url('js/inspinia.js') }}"></script>
    <script src="{{ url('js/plugins/pace/pace.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            let parteUrl = window.location.href.split('/');
            let idLi = '#'+parteUrl[3];
            $(idLi).addClass('active');

            $(idLi +" ul").addClass('in');
        })
    </script>
    @yield('script')
</body>

</html>
