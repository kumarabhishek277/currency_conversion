function calculate()
        {
            var a = document.forms["money"]["amt"].value;
            var b = document.forms["money"]["from_country"].value;
            var c = document.forms["money"]["to_country"].value;
            var xmlhttp = new XMLHttpRequest();
            var url = "http://data.fixer.io/api/latest?access_key=cc49213496db5dbdd19e20e5d2f3d187&format=1";
            xmlhttp.open('GET',url,true);
            xmlhttp.send();
            xmlhttp.onreadystatechange=function()
            {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        var rs = JSON.parse(xmlhttp.responseText);
                        var conversion_rate = rs.rates["INR"]/rs.rates["USD"];
                        //console.log(conversion_rate);
                        if(b == c)
                            {
                                document.getElementById("answer").innerHTML = "Select the country";
                            }
                        else if(b == "USD" && c == "INR")
                            {
                                document.getElementById("answer").innerHTML = (a * conversion_rate).toFixed(2);
                            }
                        else
                            {
                                document.getElementById("answer").innerHTML = (a/conversion_rate).toFixed(2);
                            }
                    }
            }

        }
