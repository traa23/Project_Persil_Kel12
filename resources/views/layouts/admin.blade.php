<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Admin Persil</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
		<a class="navbar-brand me-lg-5" href="#">
			<img class="navbar-brand-dark" src="{{ asset('assets-admin/img/brand/light.svg') }}" alt="Volt logo" />
			<img class="navbar-brand-light" src="{{ asset('assets-admin/img/brand/dark.svg') }}" alt="Volt logo" />
		</a>
		<div class="d-flex align-items-center">
			<button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
				data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</nav>

	<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
		<div class="sidebar-inner px-4 pt-3">
			<ul class="nav flex-column pt-3 pt-md-0">
				<li class="nav-item  active ">
					<a href="{{ url('/admin/persil') }}" class="nav-link d-flex align-items-center">
						<span class="sidebar-icon">
							<img src="{{ asset('assets-admin/img/brand/light.svg') }}" height="20" width="20"
								alt="Volt Logo">
						</span>
						<span class="mt-1 ms-1 sidebar-text">Persil</span>
					</a>
				</li>
				<li class="nav-item"><a class="nav-link" href="{{ url('/admin/dokumen-persil') }}"><span
							class="sidebar-text">Dokumen Persil</span></a></li>
				<li class="nav-item"><a class="nav-link" href="{{ url('/admin/peta-persil') }}"><span
							class="sidebar-text">Peta Persil</span></a></li>
				<li class="nav-item"><a class="nav-link" href="{{ url('/admin/sengketa-persil') }}"><span
							class="sidebar-text">Sengketa Persil</span></a></li>
				<li class="nav-item"><a class="nav-link" href="{{ url('/admin/jenis-penggunaan') }}"><span
							class="sidebar-text">Jenis Penggunaan</span></a></li>
			</ul>
		</div>
	</nav>

	<main class="content">
		@yield('content')
		<footer class="bg-white rounded shadow p-5 mb-4 mt-4">
			<div class="row">
				<div class="col text-center">© <span class="current-year"></span> Persil Admin</div>
			</div>
		</footer>
	</main>

	<script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
	<script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets-admin/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
</body>

</html>