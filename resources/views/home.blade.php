<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<style>
.button {
    padding: 10px 22px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
	width:300px;
}
</style>
</head>
<body>

<nav class="w3-sidebar w3-bar-block w3-card" id="mySidebar">
<div class="w3-container w3-theme-d2">
  <span onclick="closeSidebar()" class="w3-button w3-display-topright w3-large">X</span>
  <br>
  <div class="w3-padding w3-center">
    <img class="w3-circle" src="img_avatar.jpg" alt="avatar" style="width:75%">
  </div>
</div>
<a class="w3-bar-item w3-button" href="#">Movies</a>
<a class="w3-bar-item w3-button" href="#">Friends</a>
<a class="w3-bar-item w3-button" href="#">Messages</a>
</nav>

<header class="w3-top w3-bar w3-theme">
  <button class="w3-bar-item w3-button w3-xxxlarge w3-hover-theme" onclick="openSidebar()">&#9776;</button>
  <h1 class="w3-bar-item">{{Auth::user()->name}}</h1>
</header>

<div class="w3-container" style="margin-top:90px" align="center">
<hr>
<div class="w3-cell-row">
  <div class="w3-cell">
	@if(Auth::user()->isCheckedIn)
		<button class="button" onclick="location.href='{{ url('checkOut') }}'">Check Out</button>	
	@else			
		<button class="button" onclick="location.href='{{ url('checkIn') }}'">Check In</button>		
	@endif
  </div>
</div>  
<hr>
<div class="w3-cell-row">
  <div class="w3-cell" >
		<button class="button" onclick="location.href='{{ url('leaveRequest') }}'">Request Leave</button>
  </div>
</div>
<hr>
<div class="w3-cell-row">
  <div class="w3-cell">
    <button class="button" onclick="location.href='{{ url('data') }}'">Data</button>
  </div>
</div>
<hr>
</div>

<footer class="w3-container w3-bottom w3-theme w3-margin-top">
  <h3>Footer</h3>
</footer>

<script>
closeSidebar();
function openSidebar() {
    document.getElementById("mySidebar").style.display = "block";
}
function closeSidebar() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>

