       function test_password(str)
       {
            if (str.match(/[a-z]/g) && str.match(
                    /[A-Z]/g) && str.match(
                    /[0-9]/g) && str.match(
                    /[^a-zA-Z\d]/g) && str.length >= 8)
                return true;
            else
                return false;
        }
       function test_email(mail)
        {
         if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
          {
            return (true)
          }
            return (false)
        }
       function signupValidation()
       {
           var fname = document.forms["signUp"]["fname"].value;
           var lname = document.forms["signUp"]["lname"].value;
           var gender = document.forms["signUp"]["gender"].value;
           var email = document.forms["signUp"]["email"].value;
           var password = document.forms["signUp"]["password"].value;
           var repassword = document.forms["signUp"]["repassword"].value;
           if(fname==""||lname==""||gender==""||email==""||password=="")
               {
                   alert("Fill all the fields");
                   exit(0);
               }
           if(!test_email(email))
               {
                   alert("Please enter a valid email id");
                   exit(0);
               }
           if(!test_password(password))
               {
                  alert("Weak Password");
                    exit(0);
               }
           if(password!=repassword)
               {
                   alert("Both the password should be matched");
                   exit(0);
               }
       }
       function myFunction(str)
       {
        str.value = str.value.toUpperCase();
       }
       function pass()
       {
           document.getElementById("pas").innerHTML = "hello"+"<br>";
       }
