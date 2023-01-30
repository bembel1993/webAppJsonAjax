//SEND DATA LOGIN FORM
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
					function (msg) {
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
//ADD and UPDATE DATA
$('#addupdate').click(function () {
	$.post(
		'create.php',
		$("#showAddForm").serialize(),
		function (msg) {
			console.log(msg);
			$('#showAddForm').hide('slow');
			$('#showreuslt').html(msg);
		}
	);
	return false;
});

//SEND DATA REGISTRATION FORM
$('#regform').submit(function () {
	$.post(
		'registration.class.php',
		$("#regform").serialize(),

		function (msg) {
			if (msg == '<p style="color: red">Field Login is empty</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Field Password is empty</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Field Confirm Password is empty</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Field Email is empty</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Field Name is empty</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Confirmed password is not equal to your password</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Password should be at least 6 characters long</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Password should be have numbers</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Password should be have letters</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Login should be at least 6 characters long</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Name should be at least 2 characters long and only contain letters</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Name should be only containt letters</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Email is already taken</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Login is already taken</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			else {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
		}
	);
	return false;
});

//HIDE AND SHOW TABLE IN ACCOUNT
$(document).ready(function () {
	$("#hideAndShow").click(function () {
		$("#tbl").toggle();
	});
});

//HIDE AND SHOW ADDFORM IN ACCOUNT
$(document).ready(function () {
	$("#addformbtn").click(function () {
		$("#showAddForm").toggle();
	});
});
//BACK BTN TO ACCOUNT
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

//TRANSFER FROM LOG FORM IN REG FORM
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

$("#loginbtn").click(function () {
	$('#RegForm').hide('slow');
	$('#LogForm').show('slow');

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

});
$("#loginbtn").click(function () {
	$('#RegForm').hide('slow');
	$('#LogForm').show('slow');

});*/
//});



//$('#registrbtn').load('registration.php', function () {
//});




