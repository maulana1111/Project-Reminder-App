function myFunction()
      {
        var x = document.getElementById("nav");
        if(x.className === "nav")
        {
          x.className += " slide";
        }else{
          x.className = "nav";
        }
      }

function myFunction2()
{
	var x = document.getElementById("form");

	var y = document.getElementById("form1");

        if(x.className === "form")
        {
          x.className += " change";
        }else{
          x.className = "form";
        }

        if(y.className === "form1")
        {
          y.className += " change1";
        }else{
          y.className = "form1";
        }
}

