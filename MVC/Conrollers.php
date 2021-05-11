<?php

require_once("Model.php");




if (isset($_POST["submit_First_Page"]))
{

$firstName;
$lastName ;
$email ;
$phone ;
$description ;
$address ;
$gender ;
$date ;
//Error Desction
$firstNameError=false;
$lastNameError=false;
$EmailError=false;
$PhoneError=false;
$CaseEmpty=false;

    if (empty($_POST["firstName"])) {
        $CaseEmpty=true;
    } else {
        $firstName = $_POST["firstName"];
        $validateName = filter_var($firstName, FILTER_SANITIZE_STRING);
        if (!ctype_alpha($validateName)) {
            $firstNameError=true;
        }
    }

    if (empty($_POST["lastName"])) {
        $CaseEmpty=true;
    } else {
        $lastName = $_POST["lastName"];
        $validateLastName = filter_var($lastName, FILTER_SANITIZE_STRING);
        if (!ctype_alpha($validateLastName)) {
            $lastNameError=true;
        }
    }

    if (empty($_POST["phone"])) {
        $CaseEmpty=true;
    } else {
        $phone = $_POST["phone"];
        $validatePhone = filter_var($phone, FILTER_SANITIZE_STRING);
        if (!ctype_alpha($validatePhone)) {
            $PhoneError=true;
        }
    }

    if (empty($_POST["desc"])) {
        $CaseEmpty=true;
    } else {
        $description = $_POST["desc"];
    }

    if (empty($_POST["address"])) {
        $CaseEmpty=true;
    } else {
        $address = $_POST["address"];
    }

    if (empty($_POST["email"])) {
        $CaseEmpty=true;
    } else {
        $email = $_POST["email"];
        $validateEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($validateEmail, FILTER_VALIDATE_EMAIL)) {
            $EmailError=true;
        }
    }
    if(isset($_POST['gender'])){
        $gender = $_POST['gender'];

    }
    $date = $_POST["date"] ;


    if ( $CaseEmpty == false && $firstNameError==false && $lastNameError==false && $EmailError==false)
     {
        $CV = new CV($firstName, $lastName, $email, $address,$phone,$description, $gender, $date,"","","","","","","","","");
        $CV->Add();
        header("Location: View2.php");

     }
    else
    {
        if ( $CaseEmpty == true)
        echo "Please fill all cases";

        if ( $firstNameError == true)
        echo "Please Check your first name";

        if ( $lastNameError == true)
        echo "Please check your last name";

        if ( $EmailError == true)
        echo "Invalide Email";

        echo '<br><br>';

        echo '<form action="index.php">
            <input type="submit" value="Go back" />
        </form>';


    }
}
////////////////////////////////////////////////////////////////////////////////
else
if (isset($_POST["submit_Second_Page"]) || isset($_POST["submit_Second_Page_Add"]) )
{
    $company;
    $dateStart ;
    $dateFinish;
    $experience;
    $CaseEmpty=false;
    $companyError=false;

    if (empty($_POST["company"])) {
        $CaseEmpty=true;
    } else {
        $company = $_POST["company"];
        $validate = filter_var($company, FILTER_SANITIZE_STRING);
        if (!ctype_alpha($validate)) {
            $companyError=true;
        }
    }

    $dateStart = $_POST["dateS"] ;
    $dateFinish = $_POST["dateF"] ;

    if(isset($_POST['ExperienceDescription'])){
        $experience = $_POST['ExperienceDescription'];

    $CV = new CV("","", "","","","","","",$experience,$company,$dateStart,$dateFinish,"","","","","","");
    $CV->Add2();

    if (isset($_POST["submit_Second_Page"]))
    header("Location: View3.php");
    else // in case we want to add a new experience
    header("Location: View2.php");

    }
}
////////////////////////////////////////////////////////////////////////////////
else
if (isset($_POST["submit_tirth_Page"]))
{
            if(isset($_POST['place']))
            $place = $_POST['place'];

            if(isset($_POST['diplom']))
            $diplom = $_POST['diplom'];

            $dateStart = $_POST["dateS"] ;
            $dateFinish = $_POST["dateF"] ;


            if(isset($_POST['skill1']))
            $skills = $_POST['skill1'];

            for ($x = 2; $x <= 10; $x++)
            if(isset($_POST['skill'.$x]))
            $skills = $skills."/".$_POST['skill'.$x];




          $CV = new CV("", "", "", "","","", "", "", "","",$dateStart,$dateFinish, "","",$place,$diplom,$skills);
        $CV->Add4();
        header("Location: View4.php");


}
else
if (isset($_POST["submit_fourth_Page"]))
{

              if(isset($_POST['loisirs']))
              $loisirs = $_POST['loisirs'];

              if(isset($_POST['lang1']))
              $languages = $_POST['lang1'];

              for ($x = 2; $x <= 10; $x++)
              if(isset($_POST['lang'.$x]))
              $languages = $languages."/".$_POST['lang'.$x];


          $CV = new CV("","", "","","","","","","","","","","$loisirs","$languages","","","","");
          $CV->Add3();
          $CV->show();

}
else
  if (isset($_POST["rest"])) {

    $fp = fopen("../Files/etape1.txt", "w+");
    fclose($fp);
          $fp = fopen("../Files/etape2.txt", "w+");
          fclose($fp);
          $fp = fopen("../Files/etape3.txt", "w+");
          fclose($fp);
          $fp = fopen("../Files/etape4.txt", "w+");
          fclose($fp);
          header("Location: View1.php");
}

?>
