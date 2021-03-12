<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="img/profile_small.jpg"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">David Williams</span>
                            <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="index.html">Dashboard v.1</a></li>
                        <li><a href="dashboard_2.html">Dashboard v.2</a></li>
                        <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                        <li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                        <li><a href="dashboard_5.html">Dashboard v.5 </a></li>
                    </ul>
                </li>
                <li>
                    <a href="layouts.html"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="graph_flot.html">Flot Charts</a></li>
                        <li><a href="graph_morris.html">Morris.js Charts</a></li>
                        <li><a href="graph_rickshaw.html">Rickshaw Charts</a></li>
                        <li><a href="graph_chartjs.html">Chart.js</a></li>
                        <li><a href="graph_chartist.html">Chartist</a></li>
                        <li><a href="c3.html">c3 charts</a></li>
                        <li><a href="graph_peity.html">Peity Charts</a></li>
                        <li><a href="graph_sparkline.html">Sparkline Charts</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

        </div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom">
				<!-- nav topo-->
				<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
					<div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
						<form role="search" class="navbar-form-custom" action="search_results.html">
							<div class="form-group">
								<input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
							</div>
						</form>
					</div>
					<ul class="nav navbar-top-links navbar-right">
						<li>
							<span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
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
									<div class="dropdown-messages-box">
										<a class="dropdown-item float-left" href="profile.html">
											<img alt="image" class="rounded-circle" src="img/a4.jpg">
										</a>
										<div class="media-body ">
											<small class="float-right text-navy">5h ago</small>
											<strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
											<small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
										</div>
									</div>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<div class="dropdown-messages-box">
										<a class="dropdown-item float-left" href="profile.html">
											<img alt="image" class="rounded-circle" src="img/profile.jpg">
										</a>
										<div class="media-body ">
											<small class="float-right">23h ago</small>
											<strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
											<small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
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
							<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
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
									<a href="profile.html" class="dropdown-item">
										<div>
											<i class="fa fa-twitter fa-fw"></i> 3 New Followers
											<span class="float-right text-muted small">12 minutes ago</span>
										</div>
									</a>
								</li>
								<li class="dropdown-divider"></li>
								<li>
									<a href="grid_options.html" class="dropdown-item">
										<div>
											<i class="fa fa-upload fa-fw"></i> Server Rebooted
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
							<a href="login.html">
								<i class="fa fa-sign-out"></i> Log out
							</a>
						</li>
					</ul>

				</nav>
				<!-- fim nav topo-->
			</div>
			
			<!-- breadcrumb -->
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
			<!-- fim breadcrumb -->
        <div class="row wrapper wrapper-content animated fadeInRight">
          <!-- content -->
		  
		  <div id="lipsum">
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus lorem non augue porta tristique. In in dictum diam. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam lobortis elit eget mi fermentum, vitae suscipit diam eleifend. Nulla ac viverra nisi, scelerisque scelerisque ipsum. Etiam vel sem quis sem mattis ornare vitae a turpis. Nullam tincidunt convallis odio ut suscipit. Etiam quis euismod ipsum. Curabitur rhoncus justo et massa mattis convallis.
</p>
<p>
Integer augue nisl, volutpat id maximus sed, semper vel est. Sed lorem leo, imperdiet at ultrices id, fermentum et sapien. Quisque ac velit odio. Phasellus risus dolor, consequat sed purus ullamcorper, sodales bibendum mauris. Ut eget suscipit dolor. Maecenas condimentum massa enim, sed convallis augue luctus in. Donec mollis nisl ante, sit amet aliquet arcu dapibus sed. Integer tristique, erat id eleifend consequat, odio justo suscipit mauris, eget efficitur augue lectus sed nisi. Pellentesque sapien velit, placerat et mi a, venenatis lacinia turpis. Praesent feugiat orci nec nisl mollis pulvinar. Vivamus in tincidunt metus. Phasellus sit amet metus et sem rutrum sodales in eu urna. Nullam facilisis elit non porttitor rhoncus. Ut sodales dignissim laoreet. Praesent eleifend mauris eu risus dapibus posuere. Cras ornare laoreet volutpat.
</p>
<p>
Etiam massa tellus, lacinia varius erat nec, bibendum interdum erat. Aenean non ex quis nulla iaculis porta. Pellentesque porttitor magna elementum mauris faucibus, sed interdum massa aliquam. Curabitur condimentum libero eros, in vehicula tortor consectetur sodales. Quisque pharetra sapien dolor, at lacinia arcu tempus quis. Donec neque leo, rutrum a enim at, ultricies dignissim est. Ut est augue, lobortis a leo ut, porta efficitur urna. Maecenas ac enim placerat, pharetra arcu nec, sodales ex. Sed quis tempus erat. Sed tristique sit amet magna vitae pretium. Cras ac facilisis ex. Suspendisse laoreet consectetur risus, in condimentum mauris mattis imperdiet.
</p>
<p>
Cras vel nisl bibendum, auctor ex sed, semper dolor. Sed ante ipsum, scelerisque nec ligula at, tincidunt mollis augue. Fusce vel arcu quis purus molestie dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae gravida ante. Donec id fermentum dui. Curabitur sit amet vulputate elit. Nunc eu magna vehicula, tempor magna sed, pellentesque risus.
</p>
<p>
Donec ligula erat, rutrum quis eros eu, auctor viverra mauris. Maecenas fringilla urna vitae pharetra eleifend. Aenean sit amet ornare est. Morbi ultricies augue quis mauris pretium, eget finibus ligula ultricies. Ut turpis purus, hendrerit a quam eu, vulputate porttitor tellus. Nunc auctor, mi id tristique viverra, velit mi consequat urna, non porta elit elit eu purus. Donec eu dignissim augue, quis porttitor sem. Maecenas viverra orci vel justo pellentesque, a maximus nunc malesuada. Praesent viverra ipsum sit amet placerat tristique. Nullam convallis enim at odio ultrices, non suscipit justo rhoncus. Donec porttitor vulputate nulla eget lobortis. Proin placerat diam leo, ut cursus enim ultricies in.
</p>
<p>
Mauris tristique nibh ut sem maximus pellentesque. Aliquam tincidunt dui vestibulum neque feugiat, quis tempus nisl malesuada. Sed ac sem ac leo venenatis pharetra id id turpis. Nulla sit amet ipsum eget elit condimentum tempus a eu diam. Praesent lobortis fringilla accumsan. Aliquam malesuada neque vitae metus mollis, pharetra pellentesque libero iaculis. Maecenas suscipit sit amet nisi non feugiat. Vestibulum efficitur nisl massa, vitae tincidunt felis scelerisque vitae. Cras at arcu a erat sollicitudin tincidunt. Etiam rhoncus laoreet molestie. Aenean vel enim ut felis vulputate cursus scelerisque eu nunc. Donec porta nisl a lacinia posuere. Duis laoreet scelerisque dolor, eu ornare arcu. Aenean at lacus erat. Nullam mollis facilisis porta. Aliquam vehicula id velit et viverra.
</p>
<p>
Suspendisse dignissim mi nec erat ultricies, ac tincidunt sem vestibulum. Etiam eu commodo diam, quis sodales neque. Pellentesque facilisis blandit erat vel tincidunt. In hac habitasse platea dictumst. Vivamus ullamcorper convallis risus vel blandit. Vestibulum placerat dapibus ante in venenatis. Nunc faucibus lectus eu nulla congue porta. Nulla maximus, est scelerisque viverra gravida, est enim euismod sem, eget consectetur enim sem et odio.
</p>
<p>
Praesent fermentum auctor tellus, vitae malesuada arcu facilisis nec. Curabitur sed blandit tellus. Morbi rhoncus dictum nunc, quis imperdiet ligula ultricies ut. Suspendisse ut neque consequat, suscipit purus eget, elementum justo. Suspendisse elementum lorem eget dui egestas molestie. Vivamus molestie vehicula imperdiet. Suspendisse aliquet at justo id facilisis. In finibus turpis venenatis euismod venenatis. Aenean ac placerat nibh. Quisque eu nisi lorem. Integer eu interdum tellus, vel viverra lectus. Aenean aliquam sit amet nisi sit amet pretium. Vivamus ut auctor nibh, at hendrerit mauris. Vivamus id dui ac sapien luctus consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate sapien eu massa tristique blandit.
</p>
<p>
Donec iaculis scelerisque tortor vel pretium. Fusce magna velit, faucibus quis mi sit amet, dignissim bibendum orci. Phasellus cursus mollis magna sit amet iaculis. Donec eu tristique nunc. Phasellus mi urna, sagittis nec arcu et, semper accumsan lacus. Nulla et viverra odio, vitae viverra ipsum. Curabitur placerat lectus non leo pharetra, eget vehicula tellus rhoncus. Donec auctor, lorem id consequat posuere, arcu nunc semper tortor, quis ultrices lorem metus nec leo. Phasellus et erat ut augue viverra pulvinar in id massa. Sed quis facilisis orci. Sed pretium orci vitae leo tristique efficitur.
</p>
<p>
Ut sit amet nulla et dui euismod ultrices eget eu sapien. Fusce tempus sit amet diam quis cursus. Sed mollis pharetra ipsum non condimentum. Integer et lorem bibendum, consectetur lectus sit amet, gravida sapien. Duis mattis est non quam suscipit, eget gravida turpis posuere. Duis vel libero id lacus aliquam ultricies. Proin dolor elit, dapibus non purus at, mollis pharetra erat. Etiam a euismod velit. Duis pulvinar sit amet quam a cursus. Curabitur et congue ante, vitae malesuada turpis.
</p>
<p>
Nullam rutrum massa at leo laoreet faucibus. Morbi nisl leo, euismod vitae ipsum eget, consectetur suscipit lorem. Fusce ac risus a metus dapibus maximus id et nisl. Quisque a commodo ipsum. Suspendisse potenti. Nunc posuere fringilla mauris non dictum. Pellentesque molestie sapien sit amet imperdiet porta. Vivamus enim nulla, rhoncus id felis eu, posuere euismod sem. Mauris eget enim elit. Nullam hendrerit diam velit, sit amet cursus leo convallis finibus. Aliquam iaculis enim ut condimentum tempus. Suspendisse id hendrerit justo, eu hendrerit nisl. Suspendisse id sem pellentesque sem varius scelerisque at elementum erat.
</p>
<p>
Maecenas et orci vitae neque ultrices iaculis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla dictum, leo at mollis pharetra, est tortor facilisis nisi, ac accumsan velit ex vel nulla. Fusce pharetra odio quis mattis cursus. Nam elementum sapien vel est viverra pretium. Integer nec interdum eros. Nulla lorem arcu, tincidunt et lectus et, semper auctor arcu. Mauris at posuere ligula, sit amet porttitor ante. Vivamus sed sapien ac urna ornare semper. Sed sem justo, hendrerit vitae magna ac, sollicitudin rhoncus orci.
</p>
<p>
In et urna justo. Morbi ullamcorper sem nulla, sit amet scelerisque lectus accumsan id. Nullam vitae metus sit amet elit ultricies efficitur. In sapien quam, ultrices sed sodales et, condimentum at ex. In rhoncus ipsum risus, nec blandit ante tincidunt id. Praesent finibus felis ac commodo eleifend. Morbi sed sagittis quam. Maecenas non scelerisque tellus.
</p>
<p>
Integer ultricies lacus lorem, dapibus finibus lectus pellentesque in. Phasellus cursus consequat enim ac mattis. Nulla feugiat leo sapien, et fermentum tellus ullamcorper ac. Integer dignissim, ligula quis euismod mattis, lorem velit tempus odio, eu aliquam ipsum quam et tellus. Sed eu diam ut diam convallis dapibus at vitae leo. Etiam cursus sapien fermentum faucibus laoreet. Vivamus a rutrum metus. Phasellus id scelerisque tellus. Sed et euismod sem, id rutrum est. Integer consequat vel velit sit amet vehicula. Nam ac dictum mauris. Integer nisi neque, porttitor ac egestas nec, feugiat sed velit. Nam fringilla nisi eleifend iaculis elementum.
</p>
<p>
Nunc semper vulputate eros. Praesent a dapibus tellus. Donec bibendum accumsan tortor, in maximus lacus interdum vel. Duis magna ligula, fringilla suscipit finibus malesuada, blandit in libero. Maecenas sed quam tristique, accumsan libero vel, feugiat lorem. In at augue eget dui blandit molestie. Proin condimentum sit amet urna in hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam vitae ipsum pharetra, posuere nisi ut, placerat massa. Curabitur non fermentum turpis.
</p>
<p>
Sed nisi nibh, pretium eu lectus non, sodales consequat erat. Etiam sed ultricies sapien. Aliquam ac ante finibus, luctus metus eu, dapibus leo. Aenean lacus libero, accumsan nec diam sed, dictum rhoncus velit. Sed vitae arcu fermentum turpis consectetur venenatis. Etiam porttitor ex nisi, sed congue felis sodales ut. Integer nec leo ac felis accumsan mattis. Aliquam consequat purus velit, id tincidunt magna malesuada ut. Integer sit amet nunc in ligula efficitur auctor. Quisque neque ex, eleifend ut imperdiet non, posuere a dui. Aenean cursus, mauris et gravida vulputate, tellus lorem tristique neque, id sagittis lectus purus sed eros.
</p>
<p>
Sed at justo egestas orci hendrerit aliquam. Suspendisse iaculis nibh leo, vehicula feugiat augue semper non. Cras vulputate ut magna condimentum convallis. Nunc egestas eleifend dui posuere pulvinar. Aliquam porta velit in nunc porta placerat. Praesent lorem tellus, porttitor quis rhoncus sed, ultrices eget elit. Aenean congue, mauris nec aliquet vestibulum, magna justo varius elit, eu rutrum nulla arcu eget lectus. Curabitur quis fermentum ante, aliquam efficitur nulla.
</p>
<p>
Integer erat velit, feugiat quis mollis vel, laoreet quis elit. Curabitur vestibulum tortor id risus aliquam, ac pulvinar nisl rutrum. Praesent lorem metus, vestibulum vitae dictum eget, luctus at massa. Donec convallis velit eget finibus rhoncus. Nulla non ultricies lacus, a tempus lorem. Curabitur turpis leo, vulputate in augue sed, consectetur gravida urna. Vestibulum sollicitudin vulputate dolor, eu pretium nulla dignissim a. Phasellus laoreet, neque quis bibendum pharetra, nisl libero ultricies magna, non sagittis est est eget sem. Ut volutpat mi eget erat sodales sagittis. Mauris pulvinar massa ut sodales fermentum. Pellentesque sagittis rhoncus enim nec porttitor. Ut in sem at sapien pretium maximus. Aliquam elementum lectus et eros bibendum cursus. Vestibulum lacus nibh, gravida et nisi sit amet, accumsan scelerisque sapien. Integer mattis nulla ex, sed sollicitudin leo dapibus maximus.
</p>
<p>
Maecenas vehicula felis vitae dui commodo, sollicitudin euismod augue molestie. Sed vel scelerisque tortor, vitae eleifend nibh. In nisl leo, rhoncus ut est eget, rhoncus commodo quam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut luctus erat magna, eget commodo est interdum non. Maecenas pellentesque tortor nec nisi viverra tincidunt. Morbi convallis nulla pellentesque orci hendrerit maximus.
</p>
<p>
Phasellus sed massa et mauris pharetra luctus. In nisi purus, hendrerit eu congue quis, congue id mi. Nam in aliquam felis. Nullam porta, lectus quis porta pretium, quam dolor congue elit, vel dictum leo nulla at ex. Etiam vitae aliquam quam. Duis elementum augue ac justo auctor, sed fermentum risus placerat. Quisque scelerisque, urna ac facilisis tempor, sapien ex sollicitudin erat, at pulvinar arcu sem vel risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla et porta diam, non malesuada felis.
</p>
<p>
In hac habitasse platea dictumst. Proin et metus vel quam efficitur vulputate vel laoreet orci. Suspendisse est urna, lacinia ac lacus ut, tincidunt tristique lorem. Mauris sollicitudin risus eget ante pretium iaculis. Quisque sed ultricies augue. In ut tempus ligula, non tempus eros. Duis ipsum nisl, dignissim et fermentum vel, auctor vel enim. Pellentesque rutrum ullamcorper lectus vitae mattis. Curabitur ullamcorper aliquet odio, et tempor mi semper in. Aliquam nulla tortor, condimentum vitae porttitor vel, convallis vel lorem. Cras vestibulum vitae neque non euismod. In ac tempor purus, in aliquet tellus. Morbi id pretium arcu. Aenean interdum ultricies purus, sed luctus elit pellentesque ac. Sed mi felis, scelerisque a dui nec, pharetra tincidunt tortor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
</p>
<p>
Aliquam sit amet leo massa. Suspendisse in metus vel orci commodo convallis sit amet id tellus. Ut lacus libero, sollicitudin et risus vitae, porttitor eleifend leo. Etiam auctor leo at suscipit consectetur. Donec nec efficitur lectus. In sit amet arcu ac velit varius volutpat ac eu orci. Sed semper aliquet cursus. Donec efficitur commodo mi et fringilla. Curabitur placerat molestie pharetra. Suspendisse rutrum tellus non odio luctus, eget tincidunt purus mollis. Proin mattis facilisis leo. Ut et eleifend turpis. Maecenas tempor ex erat, laoreet tempor augue pellentesque eu. Etiam malesuada nisi elit, ut feugiat justo hendrerit eu.
</p>
<p>
Pellentesque fringilla, odio sit amet dignissim dignissim, risus leo venenatis lorem, scelerisque volutpat sem orci vitae purus. In eu magna in nisi sollicitudin venenatis sit amet a arcu. Proin egestas nisi id nulla dignissim, vel venenatis mauris viverra. Etiam aliquam ante nec erat porta volutpat. Maecenas condimentum, libero non elementum ultrices, erat nulla mattis lacus, ac egestas tortor mi vel purus. Vivamus sit amet enim orci. Cras et nisi metus. Fusce ultricies suscipit leo. Quisque tempor eros sit amet finibus imperdiet. Nullam et interdum nisl, in blandit nisi. Nulla pretium dapibus tellus venenatis maximus. Aliquam eleifend ante sed imperdiet feugiat. Donec urna lectus, fringilla vitae mollis a, dapibus vel augue.
</p>
<p>
Curabitur ex justo, rutrum vel volutpat a, tincidunt eu urna. Praesent et imperdiet lorem, sed laoreet turpis. In hendrerit mi eget odio imperdiet, eu pharetra mauris ornare. Fusce et nisi at neque pharetra vehicula. Nam accumsan pellentesque scelerisque. Donec non mauris lacinia nisl aliquet commodo. Pellentesque nec sapien tincidunt nulla rutrum iaculis at nec velit. Curabitur efficitur, ligula ac mollis pulvinar, lacus nibh convallis nibh, at semper tellus quam eget massa. Aliquam at nisl ac augue consequat aliquam rutrum eu diam. Phasellus pulvinar cursus augue, vitae fringilla orci mattis at.
</p>
<p>
Mauris quis nisl mauris. Aenean ultrices congue est nec interdum. Nam volutpat erat tempus nibh dapibus vestibulum. Proin nec porttitor ligula. Nunc posuere porta odio, nec facilisis dui vehicula id. Fusce ipsum ante, euismod a eros in, fermentum congue justo. Cras rutrum dignissim elit, at tempus tellus sodales quis. Praesent facilisis mi nec lorem tincidunt commodo ac sit amet leo. Quisque volutpat sem dolor, ac mattis elit semper et.
</p>
<p>
Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris erat purus, volutpat nec vestibulum vitae, ornare sit amet augue. Integer egestas vestibulum blandit. Aenean eu pulvinar est, a sollicitudin lectus. Suspendisse at arcu nunc. Vivamus tortor ligula, porttitor sed elit in, interdum convallis massa. Curabitur rhoncus malesuada feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
</p>
<p>
Phasellus nec justo interdum, accumsan ante sit amet, cursus tortor. Suspendisse potenti. Nullam et eros congue tellus condimentum lobortis. Aenean rhoncus metus eget felis pellentesque interdum. Donec ut auctor ipsum. Praesent dapibus, augue eget congue interdum, erat sem semper quam, ut porttitor eros est et nisi. Sed at sapien in dui aliquam vulputate. Aenean iaculis mi eros, eget sollicitudin elit pretium sed. Aliquam ex augue, vestibulum vitae turpis a, laoreet vulputate nibh. Duis ante lorem, luctus sit amet nisl vel, maximus tincidunt tortor. Cras pretium viverra cursus. Phasellus diam lorem, vestibulum sollicitudin ultrices at, semper a arcu.
</p>
<p>
Maecenas hendrerit ultrices risus, a pulvinar odio rhoncus fringilla. Curabitur metus risus, iaculis luctus dolor vitae, posuere ultricies arcu. Pellentesque ac augue sit amet eros porttitor egestas. Cras tortor arcu, placerat rutrum lacus interdum, pellentesque consectetur elit. Suspendisse facilisis tempor est non eleifend. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in leo tempus, convallis ligula vitae, commodo lectus. Nam hendrerit, risus non facilisis laoreet, purus diam scelerisque quam, ultricies sollicitudin magna ante et nisl. In vehicula sollicitudin neque, vel aliquam odio scelerisque nec. Quisque egestas tempor velit id condimentum. Maecenas lobortis euismod mi, vel volutpat erat. Ut ac vehicula leo. Sed dignissim sapien nibh, id rhoncus lectus mollis et.
</p>
<p>
Sed neque massa, varius sed blandit vel, feugiat id leo. Aenean vulputate mollis felis, vel tempor quam laoreet in. Vivamus volutpat fringilla ornare. Sed tempus tellus risus, sit amet ultricies felis ultricies sed. Nam fermentum condimentum nisl, vel tristique lectus molestie vel. Pellentesque eu mollis risus. Donec sit amet condimentum felis, nec pharetra massa.
</p>
<p>
Nunc a augue sed massa ultrices malesuada eget imperdiet dui. Praesent a ornare ex, et euismod orci. Donec suscipit justo eget elit pellentesque ultrices. Curabitur bibendum, metus sit amet scelerisque egestas, lorem ipsum scelerisque orci, id convallis dui metus in nibh. Pellentesque in mi ullamcorper, laoreet sapien sit amet, feugiat odio. Nullam aliquet, nisi eget egestas pulvinar, erat odio viverra quam, a malesuada eros mi quis est. Phasellus blandit sodales ante, a facilisis purus sodales ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc euismod magna nec ligula lacinia, et tempus lectus consectetur. Fusce pellentesque blandit sapien vitae mollis. Suspendisse potenti. Sed sem felis, hendrerit sed hendrerit vel, aliquam vel justo.
</p>
<p>
Aliquam eu sapien ac arcu scelerisque bibendum. Nunc auctor, augue non convallis ornare, est purus bibendum ante, quis blandit nibh eros in nunc. Nulla lobortis dolor at est aliquet, vel euismod justo hendrerit. Nullam vitae posuere sem. Cras sed quam consectetur, tincidunt ex sed, consequat massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris quis magna ante. Morbi molestie non lacus quis sagittis. Fusce cursus, ex vitae ullamcorper consequat, mauris neque imperdiet tellus, sit amet egestas nulla tortor eu mauris. Sed ultricies justo sed aliquet mattis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vel accumsan metus, et tempus ipsum.
</p>
<p>
Integer ipsum ante, efficitur non porta eu, faucibus ut libero. In condimentum neque ut porta congue. Proin sed tristique nisi. Curabitur non elit purus. Nullam ex ex, luctus eget mi convallis, suscipit elementum augue. Etiam quis condimentum nisi. Sed et dolor ex. Ut ut neque mi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Praesent vel odio a est condimentum egestas a scelerisque ex. Vestibulum ut molestie augue, sit amet efficitur metus. Donec nec mattis felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed lobortis rutrum consectetur.
</p>
<p>
Fusce rutrum, tellus eget faucibus iaculis, tortor purus auctor mi, et pharetra nibh sapien eu dolor. Cras elementum ante augue. Nam vitae posuere libero, eu porttitor enim. Maecenas pharetra vehicula velit, sit amet scelerisque magna malesuada a. Donec sed mi ac libero hendrerit vestibulum. Cras gravida neque in purus tincidunt varius. Proin semper augue ornare, rutrum ex ut, fringilla diam. Aliquam ullamcorper eu eros a malesuada. Mauris et placerat nisl. Maecenas imperdiet ligula vitae aliquam egestas. Morbi ac tincidunt risus. Donec pretium viverra fringilla. Proin euismod dignissim diam vitae lobortis. Donec dapibus orci in lectus ultricies, pellentesque pulvinar purus accumsan.
</p>
<p>
Ut vitae mattis libero. Suspendisse at est neque. Nulla ante ex, venenatis at eros et, suscipit cursus ex. Phasellus id sodales felis. Quisque non dolor id lorem mollis posuere id vitae nibh. Curabitur eu enim nulla. Proin ac magna magna.
</p>
<p>
Vestibulum dignissim urna nec nibh lacinia laoreet. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed vitae ornare purus. Nulla facilisi. Cras magna tortor, laoreet non sapien ac, euismod imperdiet orci. Cras fringilla lorem eu lacinia finibus. Quisque viverra sollicitudin imperdiet. Nullam metus augue, viverra sed urna eget, iaculis convallis arcu. Quisque eget hendrerit felis. Nulla facilisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris rutrum faucibus eros at condimentum.
</p>
<p>
Aenean et odio turpis. Donec ultricies augue sed urna posuere, vel auctor orci egestas. Morbi gravida eget ex eu tristique. Duis hendrerit mauris quam, eu bibendum lorem lobortis ac. Curabitur non turpis eget libero interdum blandit. Quisque vel venenatis velit. Donec imperdiet mollis lectus. Quisque malesuada nisl porttitor porta consectetur. Aenean tempus bibendum orci. Praesent viverra, tortor id tincidunt facilisis, mi magna pellentesque lacus, id euismod mi purus sed arcu.
</p>
<p>
Praesent scelerisque, ligula in ornare euismod, diam leo maximus nulla, ac egestas erat nisl id diam. In nec laoreet orci. Vestibulum vulputate at risus vitae auctor. Ut sem turpis, elementum sed blandit eu, imperdiet a velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nisi pretium, ornare nulla non, facilisis lorem. Nullam imperdiet, quam vitae viverra volutpat, quam velit mattis ante, at venenatis lorem odio ut ex. Nullam sit amet elementum ligula. Maecenas eget mauris eget sapien placerat sodales. Etiam egestas volutpat felis, ac efficitur diam viverra eget. Integer gravida diam turpis, eget convallis leo semper eu. Pellentesque interdum est id nunc posuere molestie. Nunc tempor in risus nec aliquet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed suscipit felis euismod orci consequat, vitae auctor magna consequat.
</p>
<p>
Nam porttitor laoreet aliquet. Ut vitae dui dui. Ut hendrerit nisi ut massa finibus, dapibus varius justo scelerisque. Cras pharetra est ac aliquam egestas. Quisque tellus metus, maximus in felis a, varius vestibulum libero. Nulla arcu lacus, condimentum at ornare sed, vehicula id mi. Ut eu mi quis leo posuere fringilla at eu mauris. Mauris sapien ante, vestibulum et imperdiet sed, faucibus sit amet dui. Quisque cursus quam eget justo molestie, et cursus velit ullamcorper. Proin consequat pretium leo ut condimentum. Vivamus justo diam, lobortis vitae enim ac, ultricies feugiat neque. Nullam vestibulum pulvinar est in vestibulum. Proin a cursus tortor. Aenean elementum fermentum leo. Sed interdum molestie leo quis iaculis.
</p>
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque congue vestibulum fermentum. Suspendisse quis mi accumsan, lacinia massa et, lobortis leo. Nulla facilisi. Duis id imperdiet sem. Aliquam diam enim, dictum ac aliquam pretium, ultrices a risus. Curabitur ac suscipit lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec id accumsan orci. Nullam laoreet, odio nec ornare finibus, felis risus pharetra mi, quis ornare felis justo in orci. Aenean aliquam, neque vel scelerisque egestas, ipsum lectus tristique enim, et feugiat ligula mi eu ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec mattis vitae lorem eu ullamcorper. Etiam eget nunc mollis est suscipit faucibus. Curabitur accumsan erat vel nisi tristique posuere.
</p>
<p>
Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam in turpis sit amet nisi dapibus faucibus quis sit amet augue. Pellentesque porttitor, nisl in tincidunt sagittis, mi ex placerat sem, quis porttitor metus nisl a metus. Mauris id rhoncus massa. Vivamus pulvinar blandit ligula, a commodo purus porttitor ac. Praesent ante urna, dignissim nec iaculis ac, luctus at enim. Integer leo nisi, finibus at nisi eu, pellentesque tempus mi. Proin quis feugiat dui. Vestibulum in lectus eu tortor varius iaculis. Nunc ut justo orci. Nullam elementum nunc purus, eget suscipit nunc ultrices a.
</p>
<p>
Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec euismod non nunc sit amet vulputate. Vivamus interdum, dui id ornare eleifend, libero enim molestie nisi, non eleifend nulla purus et magna. Nam tristique augue orci, ut ultrices eros tempus vel. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer dignissim, massa et sagittis auctor, ante orci eleifend quam, in facilisis odio diam id leo. Praesent ornare vestibulum scelerisque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In id aliquam enim, eget euismod eros. Mauris mattis neque nec tempus lacinia. Ut porttitor ipsum nec turpis auctor, in tempor velit auctor. Donec sit amet dui et ex vulputate pretium sit amet eu lorem. Nulla rutrum mauris eu semper egestas. Etiam feugiat felis dui, in molestie erat euismod vel.
</p>
<p>
Integer sed libero ac neque eleifend blandit at eu ante. Aliquam erat volutpat. Aenean ipsum nisl, faucibus ac lacinia a, consequat ac erat. Aenean in leo odio. Sed maximus elementum tellus, at vehicula sem consectetur sed. Integer feugiat lacinia ligula quis tempor. Nullam quis feugiat neque, nec luctus diam. Curabitur congue a augue eget blandit. Sed eu tortor venenatis, fermentum lectus vel, sollicitudin sem. Ut in dictum velit. Aliquam purus nisl, sodales quis posuere in, condimentum sit amet nisl. Sed metus nisi, rhoncus et turpis et, tincidunt vulputate eros. Vivamus magna velit, pulvinar in ante in, faucibus dignissim urna.
</p>
<p>
Quisque efficitur arcu ac dignissim pharetra. Pellentesque mattis risus ac nibh ultricies, vel ultricies est scelerisque. Aliquam luctus vitae enim ut condimentum. Duis sit amet porttitor urna, vel faucibus urna. Curabitur faucibus, sapien sed varius semper, nulla metus vestibulum arcu, et sollicitudin erat dui at odio. Nullam accumsan mollis lorem, nec placerat tellus tincidunt at. Sed nisl eros, scelerisque at est non, facilisis tincidunt metus. Vivamus tristique erat in aliquet sagittis. Donec sagittis vulputate orci sed tincidunt. Suspendisse luctus dignissim nunc vitae ornare.
</p>
<p>
Morbi nec nulla aliquam, volutpat risus sodales, pulvinar eros. Integer rhoncus mi erat, vel congue metus fringilla eleifend. Vivamus lectus ex, finibus nec scelerisque at, eleifend eget ipsum. In tellus ligula, tincidunt in magna vel, eleifend placerat purus. In a eros at quam pellentesque tempor non in lectus. Praesent mollis commodo purus et porta. Curabitur ut libero quis metus fringilla iaculis in vel lacus. Duis luctus vehicula nibh. Cras consectetur, nulla tempor ornare fermentum, sapien leo aliquet urna, a tincidunt nisl ex sed nunc. In dui leo, vehicula at tellus sed, semper suscipit quam. Duis aliquam sit amet velit vitae lacinia. Donec placerat imperdiet justo eget dictum. Phasellus dolor ante, bibendum id sapien sit amet, sollicitudin hendrerit justo. Maecenas mollis nec urna ac suscipit.
</p>
<p>
Fusce blandit ultrices scelerisque. Vivamus mi orci, luctus sed ullamcorper eu, ultricies ut erat. Vestibulum congue interdum tellus, ut sollicitudin tellus ullamcorper at. Integer pellentesque dignissim tellus, vel fringilla quam interdum dictum. Nulla sollicitudin accumsan odio, eget efficitur lacus malesuada ut. In hac habitasse platea dictumst. Phasellus ullamcorper nisi finibus elit commodo, eu scelerisque lacus imperdiet. Vestibulum ornare ex in ipsum tincidunt, in lobortis arcu elementum. Duis vitae dictum orci.
</p>
<p>
Cras nisi elit, feugiat finibus velit dapibus, imperdiet tristique leo. Sed sodales arcu eget tellus pharetra, quis dignissim nibh posuere. Fusce pulvinar massa et rutrum iaculis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas purus purus, tempus viverra leo id, pulvinar rutrum lacus. Donec venenatis, elit luctus faucibus varius, nunc nisl blandit nisl, non tempor tellus nisl non lacus. Maecenas vel venenatis dui. Maecenas efficitur sagittis est eu hendrerit. Morbi pellentesque faucibus purus, sit amet viverra magna molestie rutrum. Nulla facilisi. In hendrerit dui rutrum, porttitor quam cursus, rutrum velit. Quisque nec posuere orci. Sed in viverra nisl, mattis pulvinar enim. In molestie auctor finibus. Duis id egestas odio. Nulla et mollis eros.
</p>
<p>
Nulla facilisi. Etiam efficitur condimentum justo, eget accumsan nunc. Sed gravida, leo eu porttitor fringilla, felis purus gravida quam, in tempor nibh orci eget nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis faucibus tellus at nunc auctor finibus. Sed non lectus enim. Aenean tincidunt magna nec tempor rutrum. Integer tortor dui, elementum fringilla lorem ac, malesuada volutpat ante. Cras ultricies, ligula quis vestibulum finibus, tellus neque laoreet arcu, sit amet blandit lectus nisl ac augue. Sed sed ligula volutpat, elementum magna id, congue enim. Nunc vestibulum, nulla non cursus commodo, purus quam elementum ipsum, sit amet dapibus orci dolor ut enim.
</p>
<p>
Nulla ultricies orci enim, sed fermentum augue pulvinar id. Aliquam erat volutpat. Quisque varius feugiat volutpat. Sed iaculis ipsum non neque fermentum, non dignissim elit tempor. Nullam non sodales dui, at efficitur tortor. In hac habitasse platea dictumst. Aenean id purus ullamcorper, molestie mauris et, aliquet purus. Morbi ultricies eu turpis non vehicula. Ut interdum venenatis lectus vitae pulvinar. Etiam at consequat eros. Nulla tincidunt aliquam eleifend. Maecenas molestie ipsum eu eros convallis commodo. Praesent porttitor ultrices justo non cursus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque in massa in mauris iaculis congue eu ac magna. In bibendum gravida metus sit amet fringilla.
</p>
<p>
Praesent tempor cursus est, eu egestas elit varius a. Mauris non placerat arcu. Sed sed mauris luctus, laoreet eros vel, sagittis sem. Nam scelerisque interdum elit, eget aliquam elit suscipit fermentum. Suspendisse nec ullamcorper neque, vitae blandit purus. Nunc egestas finibus enim vitae congue. Nunc tincidunt sodales magna, sit amet tempor est fringilla quis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed sed purus elementum, luctus augue sit amet, tristique purus. Donec vitae placerat erat, aliquet efficitur sem. Curabitur dapibus, mauris a hendrerit bibendum, tortor felis varius lorem, in lobortis quam tortor ac nisi. Ut vitae est sed diam aliquet malesuada. Phasellus pulvinar, turpis in ultricies tincidunt, nibh diam vehicula ipsum, non euismod dui ipsum nec elit. Aenean venenatis eu massa non egestas. Nulla a quam molestie, tempor enim ac, pulvinar erat. Ut id semper dui, non commodo elit.
</p>
<p>
Pellentesque condimentum nulla sit amet odio tincidunt finibus. Donec accumsan feugiat dui, at faucibus tortor scelerisque id. Pellentesque eu imperdiet urna. Suspendisse mattis lectus eu dui euismod consectetur. Etiam sollicitudin ornare neque non eleifend. Nunc malesuada, turpis et gravida efficitur, enim justo blandit ex, nec faucibus lacus urna a risus. Nam id odio consectetur, sollicitudin nisi ac, eleifend mi. Donec sagittis volutpat tincidunt. Proin a risus urna. Donec quis lectus vitae justo laoreet blandit. Nulla venenatis lorem nec ullamcorper varius. Sed at dui id nulla efficitur blandit. Curabitur vitae eros vitae augue malesuada aliquam id et nisi. Maecenas sed ullamcorper ex. Nunc congue augue augue, ut consequat nunc laoreet et.
</p></div>
		  
		  <!-- fcontent -->
        </div>
        <div class="footer">
            <div class="float-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2018
            </div>
        </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>


</body>

</html>
