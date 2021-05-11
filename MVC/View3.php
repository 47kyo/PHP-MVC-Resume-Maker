
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

<?php
$fp = fopen("../Files/etape4.txt", "r") or exit("Unable to open file!");
$line=0;
$exist=false;
while(!feof($fp))
{
    $line++;
    $data=fgets($fp);

    if($line==1)
    {
      $school = $data;
    }
      else
      if($line==2)
        $diplom = $data;
        else
        if($line==3)
          $start = $data;
          else
          if($line==4)
          {
            $exist = true;
              $finish = $data;
          }
  

}
fclose($fp);
?>

<body>
<form action="Conrollers.php" method="post">
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">

                <div class="card-body">
                    <h2 class="title">Education & Skills</h2>
                    <p class="anas"> What are Your Skills? </p>

                    <div class="input-group" id="main">
                        <input class="input--style-1" type="text" placeholder="Enter a skill" name="skill1" required>
                    </div>


                          <input type="button" class="btn btn--radius btn--green" value="Add Another Skill" onclick="myFunction()">

<br><br>
<p class="anas"> Add Education </p>
<br>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Place of Education" value="<?php if($exist==true) echo $school;; ?>" name="place" required>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" value="<?php if($exist==true) echo $diplom;; ?>" placeholder="Diplome/Qualification" name="diplom" required>
                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" value="<?php if($exist==true) echo $start;; ?>" placeholder="Date of start" name="dateS">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" value="<?php if($exist==true) echo $finish;; ?>" type="text" placeholder="Date of finish" name="dateF">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                        </div>



                        <div class="p-t-20" style="">
                          <input type="button" style="width :33%" class="btn btn--radius btn--green" onclick="window.history.back();" value="Go Back">
                          <button style="width :32%" class="btn btn--radius btn--green" type="reset" >Reset</button>
                            <button style="width :33%" class="btn btn--radius btn--green" type="submit" name="submit_tirth_Page">Next page</button>
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

<script>
var counter=1;
function myFunction() {
  counter++;
var div = document.createElement("div");
div.innerHTML = '<br> <input class="input--style-1" type="text" placeholder="Enter a skill" name="skill'+counter+'" >';

document.getElementById("main").appendChild(div);
}
</script>
