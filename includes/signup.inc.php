<?php

include 'dbh.inc.php';

$fname = $lname = $gender = $email = $password = $repassword = "";

$ferr = $lerr = $gendererr = $emailerr = $passworderr = $repassworderr = "";






if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["signupsubmit"]))
{
    $correct = 1;
    if(empty($_POST["fname"]))
    {
        $correct = 0;
        $ferr = "First name is required";
    }
    else
    {
        $fname=test_input($_POST["fname"]);
		if(!preg_match("/^[a-zA-Z]*$/",$fname))
		{
            $correct = 0;
			$ferr="Only Characters are allowed";
		}

    }
    if(empty($_POST["lname"]))
    {
        $correct = 0;
         $lerr = "Last name is required";
    }
    else
    {
        $lname=test_input($_POST["lname"]);
		if(!preg_match("/^[a-zA-Z]*$/",$lname))
		{
            $correct = 0;
			$lerr="Only Characters are allowed";
		}

    }
    if(empty($_POST["gender"]))
    {
        $correct = 0;
         $gendererr = "Please select gender";
    }
    else
    {

        $gender = $_POST["gender"];
    }
    if(empty($_POST["email"]))
    {
        $correct = 0;
         $emailerr = "Email is required";
    }
    else
    {
       $email = $_POST["email"];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
            $correct = 0;
			$emailerr = "Invalid email format";
    	}
    }
    if(empty($_POST["password"]))
    {
        $correct = 0;
         $passworderr = "Please enter password";
    }
    else
    {
       $password = $_POST["password"];
        if (strlen($password) < 8)
        {   $correct = 0;
            $passworderr = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $correct = 0;
            $passworderr = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $correct = 0;
            $passworderr = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $correct = 0;
            $passworderr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
        else
        {
            $correct = 1;
        }

    }
    if(empty($_POST["repassword"]))
    {
        $correct = 0;
         $repassworderr = "Enter the password";

    }
    else
    {
        $repassword = $_POST["repassword"];
        if($repassword != $password)
        {
            $correct = 0;
           $repassworderr = "Both the password should be matched";
        }
    }
    if($correct == 1)
    {
            $sql = "select * from user_details where email='$email';";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0)
            {
                $emailerr = "Email id already present";
            }
            else
            {
                $sql = "insert into user_details values('$fname', '$lname','$gender' ,'$email', '$password');";
                mysqli_query($conn,$sql);
                header("Location: index.php?registration:success");
                exit(0);
            }
    }
    else
    {
        //header("Location: signup.php?registration:fail");
        //exit(0);
    }

}
else
{
    //header("Location: ../index.php?error=something wrong");
    //exit();
}

function test_input ($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
