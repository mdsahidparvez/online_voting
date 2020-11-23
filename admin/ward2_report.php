<?php include ('session.php');?>
<?php include ('head.php');?>

<head>
	<style>
		iframe{
		width:100%;
		height:100vh;
	}
	</style>

</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include ('side_bar.php');?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
				<div class="panel panel-default">
				<iframe src="../testing/ward2_result.php"></iframe>
                </div> <!-- end panel default -->
            </div>  <!-- /.row -->
        </div>   <!-- /#page-wrapper -->
    </div>   <!-- /#wrapper -->
    <?php include ('script.php');?>

</body>

</html>

