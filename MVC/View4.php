<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>CV : DAO</title>

    <!-- Icons font CSS-->
    <link href="../Ressources/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../Ressources/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../Ressources/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../Ressources/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../Ressources/css/main.css" rel="stylesheet" media="all">
</head>

<body>


  		<?php
  		$fp = fopen("../Files/etape3.txt", "r") or exit("Unable to open file!");
  		$line=0;
      $exist=false;
  		$hobbies="";
  		while(!feof($fp))
  		{
  				$line++;
  				$data=fgets($fp);

  				if($line==1)
  				{
            $exist=true;
  					$langagues = $data;
            $langagues=explode("/",$langagues);
  				}
  				else
  				if($line>1)
  				{
           $hobbies= $hobbies." ".$data;

  				}


  		}
  		fclose($fp);
  		?>
<form action="Conrollers.php" method="post">
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">

                <div class="card-body">
                    <h2 class="title">Languages & Hobbies</h2>
                    <form method="POST">


                        <p class="anas"> What Language Can you Speak? </p>

                        <div class="input-group" id="main">
                            <input class="input--style-1" type="text" placeholder="your native language.." value="  <?php if($exist==true) echo $langagues[0];  ?>" name="lang1" required>
                        </div>


                              <input type="button" class="btn btn--radius btn--green" value="Add Another Language" onclick="myFunction()">


                              <br><br>
                        <p class="anas">Describe your interests :</p>
                        <textarea name="loisirs" id="w3mission" rows="4" style="width: 100%;" class="input--style-1"><?php if($exist==true) echo $hobbies; ?></textarea>


                        <div class="p-t-20">
                          <input type="button" style="width :33%" class="btn btn--radius btn--green" onclick="window.history.back();" value="Go Back">
                            <input style="width :33%" class="btn btn--radius btn--green"  type="reset" value="Reset" onclick="">
                            <button style="width :32%" class="btn btn--radius btn--green" type="submit" name="submit_fourth_Page">Submit</button>

                        </div>
                        <div id="alert" style="text-align: center;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Jquery JS-->
    <script src="../Ressources/vendor/jquery/jquery.min.js"></script>
      <!-- Vendor JS-->
      <script src="../Ressources/vendor/select2/select2.min.js"></script>
      <script src="../Ressources/vendor/datepicker/moment.min.js"></script>
      <script src="../Ressources/vendor/datepicker/daterangepicker.js"></script>

      <!-- Main JS-->
      <script src="../Ressources/js/global.js"></script>
  </form>
  </body>

  </html>
  <!-- end document-->

  <script>
  var counter=1;
  function myFunction() {
    counter++;
  var div = document.createElement("div");
  div.innerHTML = '<br> <input class="input--style-1" type="text" placeholder="Add another language.." name="lang'+counter+'" >';

  document.getElementById("main").appendChild(div);
  }
  </script>
