

<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Representation of AJAX</title>
 <script type="text/javascript">
   function update(str)
   {
      var xmlhttp;
 
      if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }	
 
      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("data").innerHTML = xmlhttp.responseText;
        }
      }
 
      xmlhttp.open("GET","demo.php?opt="+str, true);
      xmlhttp.send();
  }
</script>
 
</head>
<body>
  <select name="opt" id="optionA" onchange="update(this.value)">
    <option value="0">Select...</option>
    <option value="1">Option1</option>
    <option value="2">Option2</option>
  </select>
  <br/>
  <select id="data">
    <option>Select an Option...</option>
  </select>
</body>
</html>