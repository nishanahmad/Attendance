
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
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css">
	<script type="text/javascript" language="javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery-ui.min.js"></script>	
	<script type="text/javascript" language="javascript" src="js/jquery.datepicker.extension.range.min.js"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
		  $('#date_range').datepicker({
			range: 'multiple', 
			range_multiple_max: '5', 
			onSelect: function(dateText, inst, extensionRange) {
			  $('[name=selectedDates]').val(extensionRange.datesText.join(','));
			}
			});

		  $('.ui-state-active').on('click', function(){
				$('.ui-state-active').removeClass('.ui-state-active');
			});			
			
		  $('#date_range').datepicker('setDate', ['+2d', '+3d', '+4d']);

		  var extensionRange = $('#date_range').datepicker('widget').data('datepickerExtensionRange');
		  if (extensionRange.datesText) $('[name=selectedDates]').val(extensionRange.datesText.join(','));
		});	
	</script>
</head>
<body>	
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post">
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

				<input type="hidden" name="_token" value="{!! csrf_token() !!}">					
				<div id="date_range" align="center"></div>
				<br>
				<textarea name="selectedDates" style="display:;"></textarea>
				<div align="center">
					<button type="submit" class="btn btn-primary">Request</button>
				</div>					
            </form>
        </div>
    </div>
</body>	
<html>	
