<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header"><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button><a href="#" class="navbar-brand">My App</a></div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="<?php echo Request::segment('1') == 'menu-one' ? 'active' : '' ?>"><?php echo HTML::link('menu-one', 'Page One') ?></li>
				<li class="<?php echo Request::segment('1') == 'menu-two' ? 'active' : '' ?>"><?php echo HTML::link('menu-two', 'Page Two') ?></li>
				<li class="<?php echo Request::segment('1') == 'menu-three' ? 'active' : '' ?>"><?php echo HTML::link('menu-three', 'Page Three') ?></li>
			</ul>
		</div>
	</div>
</nav>