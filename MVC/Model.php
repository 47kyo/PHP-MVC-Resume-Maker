<?php

require_once("../DAO/DAO.php");



class CV implements DAO
{
    private $firstName;
    private $lastName;
    private $email;
    private $address;
    private $phone;
    private $description;
    private $gender;
    private $date;
    //Experiences
    private $experience;
    private $company;
    private $dateStart;
    private $dateFinish;
    //interests and Language
    private $intrest;
    private $languages;
    //education and skills
    private $school;
    private $diplom;
    private $skills;

    public function __construct($firstName, $lastName, $email, $address,$phone,$description, $gender, $date, $experience,$company,$dateStart,$dateFinish, $intrest,$languages,$school,$diplom,$skills)
    {

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->description =$description;
        $this->address = $address;
        $this->gender = $gender;
        $this->date = $date;
        $this->experience = $experience;
        $this->company = $company;
        $this->dateStart = $dateStart;
        $this->dateFinish = $dateFinish;
        $this->intrest = $intrest;
        $this->languages = $languages;
        $this->school = $school;
        $this->diplom = $diplom;
        $this->skills = $skills;

    }
    public function Add()
    {
        $fp = fopen("../Files/etape1.txt", "w+"); //w+ method : to clean the fill before writting on it
        fwrite($fp,"$this->firstName\n$this->lastName\n$this->email\n$this->phone\n$this->address\n$this->date\n$this->gender\n$this->description\n");
        fclose($fp);



    }
    public function Add2()
    {
        $fp = fopen("../Files/etape2.txt", "w+"); //w+ method : to clean the fill before writting on it
        fwrite($fp,"$this->experience\n");
        fwrite($fp,"---\n");  //End of description
        fwrite($fp,"$this->company\n");
        fwrite($fp,"$this->dateStart\n");
        fwrite($fp,"$this->dateFinish\n");
        fwrite($fp,"\n");  //End of an exeprience Data
        fclose($fp);

    }

    public function Add3()
    {
      $fp = fopen("../Files/etape3.txt", "w+"); //w+ method : to clean the fill before writting on it
        fwrite($fp,"$this->languages\n$this->intrest");
        fwrite($fp,"\n");
        fclose($fp);

    }

    public function Add4()
    {
      $fp = fopen("../Files/etape4.txt", "w+"); //w+ method : to clean the fill before writting on it
      fwrite($fp,"$this->school\n");
      fwrite($fp,"$this->diplom\n");
      fwrite($fp,"$this->dateStart\n");
      fwrite($fp,"$this->dateFinish\n");
      fwrite($fp,"$this->skills\n");
      fwrite($fp,"\n");  //End of an exeprience Data
      fclose($fp);

    }

      public function show()
    {
        header("Location: View5.php");
    }

};

?>
