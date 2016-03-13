<!DOCTYPE html>
<html lang="en">
<head>
	<title>Team Scheduler</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="resources/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="resources/css/custom.css" type="text/css">
    
    <script src="resources/js/jquery-1.12.1.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>
    
    <script src="resources/js/button.js"></script>
    <?php include("models/date_and_time_handler.php"); ?>
</head>
<body>
    <?php include("views/navbar.php"); ?>
    
    <div class="container-fixed">
<!--        TODO: implement controller-->
        <?php include("views/set_availability.php"); ?>
    </div>
</body>
</html>