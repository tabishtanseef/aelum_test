<?php
if(isset($_POST['submit'])){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$about = $_POST['about'];
	$success_message = true;
}


?>
<!Doctype HTML>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style>
.container{
	margin-top:10%;
}
input{
	margin-top:20px;
}
#clock{
	font-size:20px;
}
.hidden{
	display:none;
}
</style>
</head>
<body>
<div class="container">
	<div class="row">
		<?php 
		if(isset($success_message)){
		?>
		<div class="col-md-12 form_sub">
			<h2>Your details are successfully submitted.</h2>
			<h6>Name : <?php echo $name; ?></h6>
			<h6>Email : <?php echo $email; ?></h6>
			<h6>DOB : <?php echo $dob; ?></h6>
			<h6>About : <?php echo $about; ?></h6>
		</div>
		<?php
		}else{
		?>
		<div class="col-md-12 form">
			<center>Fill The Form in 3 Minutes <div id="clock">03:00</div></center>
		</div>
		<div class="col-md-12 form">
			<form action="index.php" method="post" id="my-form" >
				<input type="text" name="name" id="name" placeholder="Your Name" class="form-control" required>
				<input type="email" name="email" id="email" placeholder="Your Email" class="form-control" required>
				<input type="date" name="dob" id="dob" placeholder="Your Date of Birth" class="form-control" required>
				<input type="text" name="about" id="about" placeholder="About Yourself" class="form-control" required>
				<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info" >
			</form>
		</div>
		<?php
		}
		?>
	</div>
</div>
<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script>
function countdown(element, minutes, seconds) {
    // set time for the particular countdown
    var time = minutes*60 + seconds;
    var interval = setInterval(function() {
        var el = document.getElementById(element);
        // if the time is 0 then end the counter
        if (time <= 0) {
			document.getElementById("submit").setAttribute("disabled", "true");
			var text = "Your time limit is over.";
			el.innerHTML = text;
            clearInterval(interval);
            return;
        }
        var minutes = Math.floor( time / 60 );
        if (minutes < 10) minutes = "0" + minutes;
        var seconds = time % 60;
        if (seconds < 10) seconds = "0" + seconds; 
        var text = minutes + ':' + seconds;
        el.innerHTML = text;
        time--;
    }, 1000);
}
countdown('clock', 0, 180);

</script>
</body>
</html>