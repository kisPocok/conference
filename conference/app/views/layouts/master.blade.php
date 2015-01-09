<!doctype html>
<html lang="hu">
<head>
	<title>Conference!</title>
	@include('includes.htmlhead')
	<link rel="stylesheet" href="/app/css/site.css?v=<?= $buildVersion ?>" />
	<link rel="stylesheet" href="/packages/bootstrap/dist/css/bootstrap.min.css?v=<?= $buildVersion ?>" />
</head>
<body>

@include('includes.tracking')
@yield('header')
@yield('content')
@yield('footer')

</body>
</html>