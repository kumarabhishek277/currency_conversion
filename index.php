<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/indexstyle.css">
    <style>
        nav
        {
            padding: 10px 0px 5px 12px;
            background-color: grey;
            height: 30px;
            font-size: 1.4em;
            word-spacing: 12px;
            border-radius: 12px;
        }
        a{
            text-decoration: none;
            color: white;
        }
        a:hover{
            color: black;
            text-decoration: underline;
        }

        .row{
            color: red;
            position: relative;
            left: 10%;
            right: 10%;

        }
    </style>
</head>
<body>
    <?php
        echo "<nav>";
        echo '<a href="#" style="margin-left:2%;">Home</a>';
        if(isset($_SESSION['email']))
        {
            echo '<a href="logout.php" style="float:right;margin-right:3%;">Logout</a>';
            echo '</nav>';
            echo "<h1>You are logged In.</h1>";

        }
        else
        {
            echo '<a href="signup.php" style="float:right;margin-right:3%;">SignUp</a>
                    <a href="signin.php" style="float:right;margin-right:2%;">SignIn</a>';
        }
        echo "<br>";
    ?>
    <div >
            <h1>Money Conversion</h1>
            <form action="" name="money">
                <table>
                    <tr>
                        <td>Amount</td>
                        <td>From</td>
                        <td>To</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="number" name="amt" min="0" step="any">
                        </td>
                        <td>
                            <select name="" id="from_country">
                                <option value="USD" selected>US DOLLAR(USD)</option>
                                <option value="INR">INDIAN RUPPEE</option>
                            </select>
                        </td>
                        <td>
                            <select name="" id="to_country">
                                <option value="INR" selected>INDIAN RUPPEE</option>
                                <option value="USD">US DOLLAR(USD)</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <br>
                <p><button type="button" onclick="calculate()">Submit</button></p>
            </form>
            <h1 id="answer"></h1>

    </div>
    <script src="main.js">

    </script>
</body>
</html>
