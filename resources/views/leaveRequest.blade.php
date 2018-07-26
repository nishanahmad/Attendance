
<html>
<head>
	<style>
		.ui-state-highlight
		{
			background-color:#ffffff !important;
			color:gray !important;
		}	
		.ui-state-active		
		{
			background-color:#5bc0de !important;
			color:#ffffff !important;
		}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css">
	<script type="text/javascript" language="javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery-ui.min.js"></script>	
	<script type="text/javascript">
		$( document ).ready(function() {
		  $('#date').datepicker({
			onSelect: function(dateText, inst, extensionRange) {
				$('#selectedDate').val(dateText);
			}
			});
		});			
	</script>
</head>
<body>	
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
			@foreach ($errors->all() as $error)
				<p class="alert alert-danger">{!! $error !!}</p>
			@endforeach
		
			@if(session('status'))
				@if (strpos(session('status'), 'Success') !== false)
					<div class="alert alert-success">
						{!! session('status') !!}
					</div>
				@else
					<div class="alert alert-danger">
						{!! session('status') !!}
					</div>					
				@endif
			@endif

			<div id="date" align="center"></div>
			<br>
			<form method="post">			
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">					
			<input type="hidden"  id="selectedDate" name="selectedDate"/>
			<div align="center">
				<button type="submit" class="btn btn-primary">Request</button>
			</div>								
            </form>
        </div>
    </div>
</body>	
<html>	
