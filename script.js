//SEND DATA LOGIN FORM
$('#submit').click(function () {
	$.post(
		'login.class.php',
		$("#sendform").serialize(),

		function (msg) {
			window.location.replace('account.php');
		}
	);
	return false;
});
/*$('#submit').click(function () {
	$.post(
		'login.class.php',
		$("#sendform").serialize(),

		function (msg) {
			if (msg == '<p style="color: red">Wrong username or password</p>'
				|| msg == '<p style="color: red">Field Login is empty</p>'
				|| msg == '<p style="color: red">Field Password is empty</p>') {
				console.log(msg);
				$('#my_messagelog').html(msg);
				//$('#LogForm').hide('slow');
				//window.location.replace('account.php'); 
				//window.location.href = 'account.php';

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
});*/
//UPDATE DATA
//ADD and UPDATE NEW METHOD
$('#addbtn').click(function () {
	$.post(
		'create.php',
		$("#addupdateForm").serialize(),
		function (msg) {
			console.log(msg);;
			$('#showresult').html(msg);
		}
	);
	return false;
});
//ADD DATA
/*$('#addbtn').click(function () {
	$.post(
		'crud.php',
		$("#addupdateForm").serialize(),
		function (msg) {
			if (msg == '<p style="color: red">Field Login is empty</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Field Password is empty</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Field Confirm Password is empty</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Field Email is empty</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Field Name is empty</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Confirmed password is not equal to your password</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Password should be at least 6 characters long</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Password should be have numbers</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Password should be have letters</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Login should be at least 6 characters long</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Name should be at least 2 characters long and only contain letters</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Name should be only containt letters</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Email is already taken</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Login is already taken</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Password must not contain spaces</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Password cannot contain special characters</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			if (msg == '<p style="color: red">Not correct valid Email format</p>') {
				console.log(msg);
				$('#showresult').html(msg);
			}
			else {
				console.log(msg);;
				$('#showresult').html(msg);
				//$('#showresult').hide('slow');
				//$("#refrash").load("account.php #refrash > *");
				$('#tbl').load('account.php', function () { })
			}
		}
	);
	return false;
});*/

//SEND DATA REGISTRATION FORM
$('#regform').submit(function () {
	$.post(
		'registration.class.php',
		$("#regform").serialize(),

		function (msg) {
			if (msg == 'Field Login is empty') {
				console.log(msg);
				$('#my_messagereg').html(msg);
				
			}
			if (msg == '<p style="color: red">Field Password is empty</p>') {
				console.log(msg);
				$('#my_messagereg').html(msg);
			}
			if (msg == '<p style="color: red">Field Confirm Password is empty</p>') {
				console.log(msg);
				$('#my_messageconpass').html(msg);
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
				$('#my_messagelog1').html(msg);
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

//SHOW ADDUPDATE FORM
$(document).ready(function () {
	$("#addupbtn").click(function () {
		$.get(
			'addUser.php',
			function (msg) {
				console.log(msg);
				$('#showaddup').html(msg);
			}
		);
		return false;
	});
});
/*$(document).ready(function () {
	$("#addupbtn").click(function () {
		$.get(
			'addUser.php',
			function (msg) {
				console.log(msg);
				$('#showaddup').html(msg);
				//$('#showaddup').show('slow');
			}
		);
		return false;
	});
});*/
//
//HIDE AND SHOW ADDFORM IN ACCOUNT
/*$(document).ready(function () {
	$("#addformbtn").click(function () {
		$("#showAddForm").toggle();
	});
});*/
//BACK BTN TO ACCOUNT
$(document).ready(function () {
	$("#backbtn").click(function () {
		$.get(
			'account.php',
			function (msg) {
				console.log(msg);
				$('#showaddup').hide('slow');
				//window.location.replace('account.php');
			}
		);
		return false;
	});
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

//LOGOUT BUTTON
$('#logoutbtn').click(function () {
	$.post(
		'logout.php',
		//$("#sendform").serialize(),
		function (msg) {
			window.location.replace('index.php');
		}
	);
	return false;
});

//BACK BTN TO LOGIN FORM
$('#indexbtn').click(function () {
	$.get(
		'logout.php',
		//$("#sendform").serialize(),
		function (msg) {
			window.location.replace('index.php');
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

});
$("#loginbtn").click(function () {
	$('#RegForm').hide('slow');
	$('#LogForm').show('slow');

});*/
//});



//$('#registrbtn').load('registration.php', function () {
//});




