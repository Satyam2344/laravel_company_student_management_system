@if (empty(session('user.email')))
    {{ route('login') }}
    {{ exit() }}
@endif
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<style>
	body{
			background-color: #F5F5F5;
		}
		.head{
			position:fixed;
			top:0px;
			left: 0px;
			margin: 0px;
			text-align: center;
			background-color: #3232CD;
			width: 100%;
			color:white;
		}
		.content{
			position: fixed;
			padding:18px;
			margin: 4px;
			top:100px;
			left: 440px;
			width: 450px;
			border:2px solid #2E37FE;
			border-radius: 25px;
			box-shadow: 3px 5px blue;
			background-color: white;
		}
		font{
			font-size: 24px;
			color: #2E37FE;
		}
		form{
			font-size: 18px;
		}
		.content input[type="text"]{
			height: 30px;
			width: 450px;
			box-sizing: border-box;
			border:1px solid #2E37FE;
			border-radius: 25px;
			text-align: center;
			font-size: 16px;
		}
		.content input::placeholder{
			color:#CCC;
			font-size: 18px;
		}
		textarea{
			font-size: 16px;
			width: 440px;
		}
		select{
			width:140px;
			height: 25px;
		}
		.content input[type="submit"]{
			font-size: 20px;
			text-align:center;
			float: center;
			padding: 8px;
			width: 120px;
			border:1px solid blue;
			border-radius: 20px;
			background-color:white;
			color: #2E37FE;
			cursor: pointer;
		}
		.content input[type="reset"]{
			font-size: 20px;
			text-align:center;
			float: center;
			padding: 8px;
			border: 8px;
			width: 120px;
			border:1px solid blue;
			border-radius: 20px;
			background-color: white;
			color: #2E37FE;
			cursor: pointer;
		}
		.content input[type="submit"]:hover{
			color:white;
			background-color: #2E37FE;
		}
		.content input[type="reset"]:hover{
			color:white;
			background-color: #2E37FE;
		}
	</style>
</head>
<body>
	<div class="content">
		<font><b>Company Registration form</b></font><br><br>
		<form action="/add/company/registration" method="post">
            @csrf
			<b>Company name</b><br> <input type="text" name="company_name"  placeholder="company name" required><br><br>
			<b>Address</b> <br><textarea name="address" placeholder="Enter address here"></textarea><br><br>
            <b>Email</b><br> <input type="email" name="email"  placeholder="email" required><br><br>
            <b>Department</b><br> <input type="text" name="department"  placeholder="department" required><br><br>
			<br><br>
			<input type="submit" name="submit" value="Register">
			<input type="reset" name="reset" value="Cancel" onclick="myFunction()">
		</form>
	</div>
	<script type="text/javascript">
		function myFunction() {
    alert("Registration Cancelled!");
	}
</script>

</body>
</html>
