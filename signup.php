<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/signupstyle.css">
    <script src="signupjs.js"></script>
</head>
<body>
      <?php  include 'includes/signup.inc.php';
        ?>
   <div class="container"  style="background-color:aqua;">
       <p style="font-family:serif; padding-top:20px;text-align: center; font-size: 2em;"><b>Sign Up Page</b></p>
       <form method ="POST" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' name="signUp">
         <table>
             <tr>
                 <td style="width: 90px">First Name</td>
                 <td style="width: 450px"><input type="text" placeholder="First Name" name="fname" onkeyup="myFunction(this)"><span class="error">* <?php echo "$ferr"?></span></td>
             </tr>
             <tr>
                 <td>Last Name</td>
                 <td colspan="2"><input type="text" placeholder="Last Name" name="lname" onkeyup="myFunction(this)">
                 <span class="error">* <?php echo "$lerr"?></span></td>
             </tr><br>
             <tr>
                 <td>Gender</td>
                 <td><input type="radio" name="gender" value="male">Male <input type="radio" name="gender" value="female">Female  <span class="error"> * <?php echo "$gendererr"?></span></td>
             </tr>
             <tr>
             <td>Email</td>
                 <td colspan="3"><input type="email" name="email" placeholder="Enter Email"><span class="error"> * <?php echo "$emailerr"?></span></td>
             </tr>
             <tr>
                 <td>Password</td>
                 <td colspan="2"><input type="password" name="password" placeholder="Enter password" onfocus="pass()"><span class="error"> * <?php echo "$passworderr"?></span></td>
             </tr>
             <tr>
                 <td>Re-password</td>
                 <td colspan="2"><input type="password" name="repassword" placeholder="Re-enter password"> <span class="error"> * <?php echo "$repassworderr"?></span></td>
             </tr>
             <br>
             <tr>
                 <td><input type="reset" value="Reset"></td>
                 <td><button type="submit" onclick="signupValidation()" name="signupsubmit">Submit</button></td>
             </tr>
         </table>
       </form>
       <p style="font-size: 1.2em;padding-left: 30%">
        Do u have account already ? <a href="signin.php">LogIn</a>
       </p>
   </div>
</body>
</html>
