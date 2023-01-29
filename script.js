//////////--SEND DATA LOGIN FORM--////////////
$('#sendform').submit(function () {
	$.post(
		'login.class.php', // адрес обработчика
		$("#sendform").serialize(),

		function (msg) { // получен ответ сервера — это json! 
			console.log(msg); // в консоль для контроля
			$('#my_messagelog').html(msg);
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

//////////--SHOW ADD FORM IN ACCOUNT--/////////////
$(document).ready(function () {
	$('#addformbtn').click(function () {
		$.get(
			'addUser.php',
			//$("#showAddForm").serialize(),
			function (msg) {
				console.log(msg);
				$('#showAddForm').html(msg);
			}
		);
		return false;
	});
});
////////////////--HIDE AND SHOW TABLE IN ACCOUNT--/////////////
$(document).ready(function () {
	$("#hideAndShow").click(function () {
		$("#tbl").toggle();
	});
});
////////////////--BACK BTN TO ACCOUNT--/////////////
$("#backbtn").click(function () {
	$.get(
		'account.php',

		function (msg) {
			console.log(msg);
			$('#showAddForm').hide('slow');
			//$('#registerFormShow').html(msg);
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
/*
$(document).ready(function () {
	$("#loginbtn").click(function () {
		$('#RegForm').hide('slow');
		$("#LogForm").show('slow');
	
	});
});

$(document).ready(function () {
	$("#registrbtn").click(function () {
		$('#LogForm').hide('slow');
		$("#RegForm").show('slow');
		
	});
});
*/
//////////--TRANSFER FROM LOG FORM IN REG FORM--////////////
$('#registrbtn').click(function () {
	$.get(
		'registration.php',

		function (msg) {
			console.log(msg);
			$('#wrapLogForm').hide('slow');
			$('#registerFormShow').html(msg);
		}
	);
	return false;
});

$('#loginbtn').click(function () {
	$.get(
		'login.php',
		function (msg) {
			console.log(msg);
			$('#registerFormShow').hide('slow');
			$('#wrapLogForm').html(msg);
		}
	);
	return false;
});




