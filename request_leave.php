<title>::Leave Management::</title>
<head><style>
            .a{
                 background-image: url(image/6.png);
                 background-size: cover;
            }
            .aa{
				background-color:lightgrey;
                margin:auto;
				text-decoration: solid;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 60px;
				

            }
        </style></head>
<?php
session_start();
include 'connect.php';
if(isset($_SESSION['user']))
	{
	echo "<link rel='stylesheet' type='text/css' href='style.css'>";
	echo "<center>";
	echo "<div class = 'textview'>";
	echo "<h1 class='aa'>Leave Management System</h1>";
	include 'clientnavi.php';
	echo "<h2>Please Select Your Leave Type</h2>";
	if(isset($_GET['err']))
				{
				echo "<div class = 'error'><b><u>".htmlspecialchars($_GET['err'])."</u></b></div>";
				}
	echo "<form action = 'leaverequest.php' method = 'post'>";
	$sql = "SELECT * FROM employees WHERE UserName = '".$_SESSION['user']."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
				{
				if($row['SickLeave'] > 0)
					{
					echo "<button type = 'submit' name = 'type' value = 'Sick Leave' class = 'login-button shadow'>Sick Leave</button>";	
					}
				else
					{
						echo "<button type = 'submit' name = 'type' value = 'Sick Leave' class = 'error-button shadow' disabled>Sick Leave</button>";
					}
				if($row['EarnLeave'] > 0)
					{
					echo "<button type = 'submit' name = 'type' value = 'Earn Leave' class = 'login-button shadow'>Earn Leave</button>";	
					}
				else
					{
						echo "<button type = 'submit' name = 'type' value = 'Earn Leave' class = 'error-button shadow' disabled>Earn Leave</button>";
					}
				if($row['CasualLeave'] > 0)
					{
					echo "<button type = 'submit' name = 'type' value = 'Casual Leave' class = 'login-button shadow'>Casual Leave</button>";	
					}
				else
					{
						echo "<button type = 'submit' name = 'type' value = 'Casual Leave' class = 'error-button shadow' disabled>Casual Leave</button>";
					}
				}
		}
	echo "</form>";
	}
	else
		{
		header('location:index.php?err='.urlencode('Please Login for Accessing this page'));
		}
?>

<script type="text/javascript">
        function noBack()
         {
             window.history.forward()
         }
        noBack();
        window.onload = noBack;
        window.onpageshow = function(evt) { if (evt.persisted) noBack() }
        window.onunload = function() { void (0) }
    </script>