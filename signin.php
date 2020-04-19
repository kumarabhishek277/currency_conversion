<!doctype html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="css/signinstyle.css">
    </head>
    <body>
    <?php
        $emailerr = $pwderr = "";
        include 'includes/dbh.inc.php';
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['loginsubmit']))
        {
            include 'includes/dbh.inc.php';
            $correct = 1;
            if(empty($_POST['email']))
            {
                $emailerr = "Please enter the email";
                $correct = 0;
            }
            else
            {
                $email = $_POST['email'];
            }
            if(empty($_POST['password']))
            {
                $pwderr = "Password is required";
                $correct = 0;
            }
            else
            {
                $pwd = $_POST['password'];
            }
            if($correct == 1)
            {
                $sql = "select * from user_details where email = '$email';";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck < 1)
                {
                    $emailerr = "Invalid Account";
                }
                else
                {
                    $row = mysqli_fetch_assoc($result);
                    if($pwd != $row['password'])
                    {
                        $pwderr = "Invalid Password";
                        //exit(0);
                    }
                    else if($pwd == $row['password'])
                    {
                        session_start();
                        $_SESSION['email']=$email;
                        $_SESSION['status'] = "active";
                        header("Location: index.php");
                        exit(0);
                    }
                    else
                    {
                        header("Location: signin.php?login=error_occurred");
                    }
                }
            }
        }
      ?>
     <div>
         <p style="font-family:serif;padding-top:40px;text-align: center; font-size: 2em"><b>Login Page</b></p>
        <form method="POST" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'  name="signin">
          <p>
           Email
           <input type="email" name="email" placeholder="Enter Email" required>
           <span style="color:red;font-size:0.7em">* <?php echo "$emailerr"?></span>
           </p>
             <p>
              Password
               <input type="password" name="password" placeholder="Enter Password" required>
               <span style="color:red;font-size:0.7em">* <?php echo "$pwderr"?></span>
               <button type="submit" name="loginsubmit">Submit</button>
           </p>
       </form>
       <p style="font-size: 1.2em">
        No Account ? <a href="signup.php">Register</a>
       </p>
     </div>

    </body>
</html>
