
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
  $fp = fopen("../Files/etape1.txt", "r") or exit("Unable to open file!");
  $line=0;
  $DateExist=false;
  while(!feof($fp))
  {
      $line++;
      $data=fgets($fp);

      if($line==1)
      {
        $FirstName=$data;

      }
      else
      if($line==2)
      $LastName=$data;
      if($line==3)
      $Email=$data;
      if($line==4)
      $Number=$data;
      if($line==5)
      $Adress=$data;
      if($line==6)
      $birthday=$data;
      if($line==7)
      $gender=$data;
      if($line==8)
      {
        $DateExist=true;
        $description=$data;
      }
      if($line>8)
      $description=$description." ".$data  ;



  }
  fclose($fp);
?>


<form action="Conrollers.php" method="post">
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">

                <div class="card-body">
                    <h2 class="title">Personal Informations</h2>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="First Name" name="firstName" value="<?php if($DateExist==true)  echo $FirstName  ?>" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Last Name" name="lastName" value="<?php if($DateExist==true)  echo $LastName  ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email" name="email" value="<?php if($DateExist==true)  echo $Email  ?>" required>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="tel" placeholder="Phone number" name="phone" value="<?php if($DateExist==true)  echo $Number  ?>" required>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="BIRTHDATE" value="<?php if($DateExist==true)  echo $birthday  ?>" name="date">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>

                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Adress" name="address" value="<?php if($DateExist==true)  echo $Adress  ?>" required>
                        </div>

                        <p class="anas">Personal description:</p>
                        <textarea name="desc" id="w3mission" rows="5" style="width: 100%;" class="input--style-1"><?php if($DateExist==true)  echo $description;  ?></textarea>

                        <div class="p-t-20">
                            <button style=" width : 49%" class="btn btn--radius btn--green" type="reset" >Reset</button>
                            <button style=" width : 49%" class="btn btn--radius btn--green" type="submit" name="submit_First_Page">Next Page</button>
                        </div>

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
