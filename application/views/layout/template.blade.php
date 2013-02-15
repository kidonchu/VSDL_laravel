<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>@yield('title') | VSDL</title>
		{{ Asset::styles() }}
		{{ Asset::scripts() }}
	</head>
	<body>
		<div id="wrapper">
			<header><h1>Very Simple Daily Log</h1></header>
			<div id="cnt">
				@yield('content')
			</div>
		</div>
		@yield('script')
	</body>
</html>