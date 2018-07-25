@section('title', 'Check Out')

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<script src="{{asset('js/bootstrap.js')}}"></script>
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

	<!--timer-->
	<script src="{{asset('js/jClocksGMT.js')}}"></script>
	<script src="{{asset('js/jquery.rotate.js')}}"></script>
	<link rel="stylesheet" href="{{asset('css/jClocksGMT.css')}}">	
	<script>
				$(document).ready(function(){
					$('#clock_hou').jClocksGMT({offset: '-5', hour24: true});
					$('#clock_dc').jClocksGMT({offset: '-4', digital: false});
					$('#clock_india').jClocksGMT({offset: '+5.5'});
				});
			</script>
	<!--timer-->	
 </head>
 {{$now}}
 <body>
	@foreach ($errors->all() as $error)
		<p class="alert alert-danger">{{ $error }}</p>
	@endforeach

	@if(session('status'))
		@if (strpos(session('status'), 'Success') !== false)
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@else
			<div class="alert alert-danger">
				{{ session('status') }}
			</div>					
		@endif
	@endif 
	 <div class="timer">
		 <div id="clock_india" class="clock_container">            
			<div class="digital">
				<span class="hr"></span><span class="minute"></span> <span class="period"></span>
			</div>
			<div class="clockHolder">
				<div class="rotatingWrapper"><img class="hour" src="images/clock_hour.png" /></div>
				<div class="rotatingWrapper"><img class="min" src="images/clock_min.png" /></div>
				<div class="rotatingWrapper"><img class="sec" src="images/clock_sec.png" /></div>
				<img class="clock" src="images/clock_face2.png" /> 
				<div class="clck-btns">
					<form class="form-horizontal" method="post">
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
						<div class="form-group">
							<div class="col-lg-10 col-lg-offset-2">
								<button type="submit" class="btn btn-primary btn-raised">Check Out</button>
							</div>
						</div>
					</form>	
					
				</div>
			</div>             
		 </div>
	 </div>

<div class="copywrite">
	 <div class="container">
		 <p>Template by <a href="http://w3layouts.com">W3layouts</a></p>
	 </div>
</div>
</body>

