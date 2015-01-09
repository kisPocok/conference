<!doctype html>
<html lang="hu">
<head>
	<title>local.dev</title>
	@include('includes.htmlhead')
	<link rel="stylesheet" href="/app/css/site.css?v=<?= $buildVersion ?>" />
</head>
<body>

@include('includes.tracking')
@yield('header')
@yield('content')
@yield('footer')

</body>
</html>