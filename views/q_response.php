<?php
	require('../dao/controller.php');
    $q = new Query;
?>
<html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../css/style.css"  media="screen,projection"/>
      <link href="../materialize/icon.css" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Database Basics - Response</title>
      <meta charset="UTF-8">
      <link rel="icon" type="image/png" href="../images/favicon/favicon.png">
    </head>

    <body>
 	 <nav>
	    <div style="margin-left: -380px;" class="nav-wrapper teal center-align">	
	       <img style="margin-top: 10px;" width="40" src="..	/images/ball.svg"> <a href="#" class="brand-logo">European Soccer Database</a>
	    </div>
 	</nav>
     <div style="margin-top: 100px;" class="container">
       <div class="card sticky-action">
   			<div class="card-content black-text">
              <span class="card-title">Resultado da consulta <em><font size="4" color="red"><?php echo $_POST['query'];?></font></em></span>
            </div>
    		<div class="card-action">			
			<?php
				$q->execute($_POST['query']);
			?>
    		</div>
 	    </div>

       	<div class="left-align">
       		<a href="javascript:history.back()" class="waves-effect waves-teal btn-flat"><span aria-hidden="true">←</span> Voltar para as consultas</a>
       	</div>

     </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../jquery/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
      <script type="text/javascript">
      	$(document).ready(function(){
		    $('.parallax').parallax();
		    $('.collapsible').collapsible();
	    });
      </script>
    </body>
 </html>