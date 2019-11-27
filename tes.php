<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Krajee JQuery Plugins - &copy; Kartik</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  
    <link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <!--suppress JSUnresolvedLibraryURL -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/star-rating.js" type="text/javascript"></script>
<body>
<div class="container">
    <div class="page-header">
        <h2>Bootstrap Star Rating Examples
            <small>&copy; Kartik Visweswaran, Krajee.com</small>
        </h2>
    </div>
    <body onload="wal()">

    <form>
   
            <script src="static/script/sweetalert.js"></script>
    </form>
    <hr>

</div>
</body>
</html>
    <script>
      wal({
  title: 'Signed Up!',
  html: 'Thank you for registering',
  type: 'success',
  confirmButtonText: 'Got it!'
}).then(function () {
  window.location.href = "test.php";
}, function (dismiss) {
  // dismiss can be 'cancel', 'overlay',
  // 'close', and 'timer'
  if (dismiss === 'cancel') {
    window.location.href = "test.php";
  }
});
        </script>