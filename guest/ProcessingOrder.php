<?php
require_once "../database/db_config.php";

class ProcessingOrder
{
    /**
     * @return mixed
     */
    public function getCompanyAddress()
    {
        return $this->company_address;
    }

    /**
     * @param mixed $company_address
     */
    public function setCompanyAddress($company_address): void
    {
        $this->company_address = $company_address;
    }

    /**
     * @return mixed
     */
    public function getIdCity()
    {
        return $this->id_city;
    }

    /**
     * @param mixed $id_city
     */
    public function setIdCity($id_city): void
    {
        $this->id_city = $id_city;
    }

    /**
     * @return mixed
     */
    public function getMobilePhone()
    {
        return $this->mobile_phone;
    }

    /**
     * @param mixed $mobile_phone
     */
    public function setMobilePhone($mobile_phone): void
    {
        $this->mobile_phone = $mobile_phone;
    }
    private $company_address;
    private  $id_city;
    private $mobile_phone;
    private $note;




    public function renderForm(){
    define("SERVERNAME","localhost");
define("USERNAME","nevakcinisani");
define("PASSWORD","Y7pINIJQYFbsdqF");
define("DATABASE","nevakcinisani");
define("ENCODING","utf8");



try {
    $connection = new PDO("mysql:host=".SERVERNAME.";dbname=".DATABASE.";charset=".ENCODING."", USERNAME, PASSWORD);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //  echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

        echo "<form action='' method='post'>
<div class='container'>

<div class='row '>
<div class='col'>
<label for='company-address'>Adresa za dostavu</label> <br><input type='text' name='company-address' id='company-address' required><br>
</div>
<div class='col'>
<label for='city'>Grad</label>
<br>
<select name='city' id='city'>" ;
        $city=array();
       $city=$this->getCity($connection);
       var_dump($city);
       foreach ($city as $value){
        echo '<option value="'.$value.'">'.$value.'</option>';
       }
        echo "</select>
</div>
</div>



<div class='row'>
<div class='col input-box'>
<label for='number'>Kontakt telefon</label><br>
<span class='prefix''>+381</span>
<input type='number' name='number' id='number' placeholder='065789777' required><br><br>
</div>
<div class='col'>
<label for='note'>
Napomena:
</label>
<textarea name='note' id='note'></textarea></div>


</div><br>
<div class='row'>
<input type='submit' name='processing' id='processing' value='Potvrdi'>
</div>
       
        </div>
        </form>";
    }
    public  function getCity($connection){
        $allCities=[];

        $query="SELECT * FROM city ORDER BY city_name ASC";
        $statement=$connection->prepare($query);
        $statement->execute();
        $result=$statement->fetchAll();
        foreach ($result as $value){
           $allCities[]= $value['city_name'];
          //  echo '<option value="'.$value['id_city'].'">'.$value['city_name'].'</option>';

        }
        var_dump($allCities);


        return $allCities;

    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note): void
    {
        $this->note = $note;
    }


}