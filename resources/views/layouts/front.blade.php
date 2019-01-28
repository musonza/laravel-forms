<!DOCTYPE html>
<html lang="en">

<head>
	<title>Forms</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="flex flex-col min-h-screen">
     <main class="py-4 col-md-12 ml-sm-auto col-lg-12 pt-3 px-4">
	    <div class="container">
	        <div class="row justify-content-center">
	            <div class="col-md-12">
	                <div class="flash-message">
	                  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
	                    @if(Session::has('alert-' . $msg))
	                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
	                    @endif
	                  @endforeach
	                </div>
	            </div>
	        </div>
	    </div>
        @yield('content')
      </main>
    </div>
</body>
</html>
