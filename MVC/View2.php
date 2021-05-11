
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
  $fp = fopen("../Files/etape2.txt", "r") or exit("Unable to open file!");
  $cnt=1;
  $ExpDesc=array();
  $ExpDescCounter=0;
  $Company= array();
  $StartDate= array();
   $finishDate= array();
  while(!feof($fp))
  {
      $data=fgets($fp);
      if($cnt==1)
      {
        if($data!="---\n")
        {
          if(empty($ExpDesc[$ExpDescCounter]))
          $ExpDesc[$ExpDescCounter]="";
          $ExpDesc[$ExpDescCounter].=$data;
        }
        else
        {
            $cnt++;
            $ExpDescCounter++;
        }
      }else
        if($cnt==2)
        {
          array_push($Company,$data);
          $cnt++;
        }else
          if($cnt==3)
          {
            array_push($StartDate,$data);
            $cnt++;
          }else
            if($cnt==4)
            {
              array_push($finishDate,$data);
              $cnt++;
            }
            else
              if($cnt==5)
              {
                $cnt=1;
              }


  }
  fclose($fp);
  ?>
<form action="Conrollers.php" method="post">
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">

                <div class="card-body">
                    <h2 class="title">Experiences</h2>

                        <p class="anas">Professional Experiences Descreption :</p>
                        <textarea name="ExperienceDescription" id="w3mission" rows="7" style="width: 100%;" class="input--style-1"><?php if($ExpDescCounter>0) echo $ExpDesc[$ExpDescCounter-1]; ?></textarea>
                        <br><br>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Place of experience" name="company" value="<?php if($ExpDescCounter>0) echo $Company[$ExpDescCounter-1]; ?>" required>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="Date of start" value="<?php if($ExpDescCounter>0) echo $StartDate[$ExpDescCounter-1]; ?>" name="dateS">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" value="<?php if($ExpDescCounter>0) echo $finishDate[$ExpDescCounter-1]; ?>" placeholder="Date of finish" name="dateF">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                        </div>

                  
                        <div class="p-t-20" style="">
                              <input type="button" style="width :33%" class="btn btn--radius btn--green" onclick="window.history.back();" value="Go Back">
                            <button style="width :32%" class="btn btn--radius btn--green" type="reset" >Reset</button>
                            <button style="width :33%" class="btn btn--radius btn--green" type="submit" name="submit_Second_Page">Next page</button>
                        </div>

                </div>
            </div>
        </div>
    </div>
 </form>

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
