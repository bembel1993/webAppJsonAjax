//////////--SEND DATA LOGIN FORM--////////////
$('#submit').click(function () {
	$.post(
		'login.class.php', 
		$("#sendform").serialize(),

		function (msg) {
			if (msg == '<p style="color: red">Wrong username or password</p>'
				|| msg == '<p style="color: red">Field Login is empty</p>'
				|| msg == '<p style="color: red">Field Password is empty</p>') {
				console.log(msg);
				$('#my_messagelog').html(msg);
			}
			else {
				$.get(
					'account.php',
					function(msg){
						console.log(msg);
						$('#LogForm').hide('slow');
						$('#body2').html(msg);
					}
				);
				return false;
				//window.location.href = 'account.php';
			}
		}
	);
	return false;
});

//////////--SEND DATA REGISTRATION FORM--////////////
$('#regform').submit(function () {
	$.post(
		'registration.class.php',
		$("#regform").serialize(),

		function (msg) {
			console.log(msg);
			$('#my_messagereg').html(msg);
		}
	);
	return false;
});

////////////////--HIDE AND SHOW TABLE IN ACCOUNT--/////////////
$(document).ready(function () {
	$("#hideAndShow").click(function () {
		$("#tbl").toggle();
	});
});

////////////////--HIDE AND SHOW ADDFORM IN ACCOUNT--/////////////
$(document).ready(function () {
	$("#addformbtn").click(function () {
		$("#showAddForm").toggle();
	});
});
////////////////--BACK BTN TO ACCOUNT--/////////////
$("#backbtn").click(function () {
	$.get(
		'account.php',

		function (msg) {
			console.log(msg);
			$('#showAddForm').hide('slow');
		}

	);
	return false;
});

//////////--TRANSFER FROM REG FORM IN LOGIN FORM--////////////
/*$('#loginbtn').click(function() {
	$.post(
		'login.php', 
		
		function(msg) { 
			console.log(msg); 
			$('#RegForm').hide('slow');
			$('#loginFormShow').html(msg);
		}
	);
	return false;
});*/

/*$(document).ready(function () {
	$("#loginbtn").click(function () {
		$('#RegForm').hide('slow');
		$('#LogForm').show('slow');
	
	});
});*/

//$(document).ready(function () {
/*$("#registrbtn").click(function () {
	$('#LogForm').hide('slow');
	$("#registerFormShow").show('slow');
	
});*/
$("#loginbtn").click(function () {
	$('#RegForm').hide('slow');
	$('#LogForm').show('slow');

});
//});

//////////--TRANSFER FROM LOG FORM IN REG FORM--////////////
$(document).ready(function () {
	$('#registrbtn').click(function () {
		$.get(
			$('#registerFormShow').load('registration.php', function () {
				$('#LogForm').hide('slow');
			}),
		);
		return false;
	});
	$('#loginbtn').click(function () {
		$.get(
			function (msg) {
				$('#registerFormShow').load('registration.php', function () {
					//	$('#registerFormShow').hide('slow');
				}).hide('slow'),
					$('#LogForm').html(msg);
			}
		);
		return false;
	});
});

//$('#registrbtn').load('registration.php', function () {
//});




