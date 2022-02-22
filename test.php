<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="myForm" onsubmit="return fetchcall();">
  <input type="text" name="name" value="Jon" required/>
  <input type="email" name="email" value="jon@doe.com" required/>
  <input type="submit" value="Save"/>
</form>
</body>
</html>
<script>
function fetchcall () {
  // (B1) GET FORM DATA
  var data = new FormData(document.getElementById("myForm"));
 
  // (B2) FETCH
  fetch("0-dummy.php", { method: "POST", body: data })
  .then(res => res.text())
  .then((txt) => {
    console.log(txt);
  })
  .catch((err) => { console.error(err); });
  return false;
}
</script>