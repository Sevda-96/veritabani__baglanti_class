<?php
class Connect{

    public $connect;

    //veritabanın host kullanici adi ve şifresi
    private $host = 'mysql:host=localhost'; 
    private $username = ''; 
    Private $password = '';

    public function __construct()
    {
        try{
            $this->connect = new PDO( //pdo ile baglanti bilgilerini eklememiz gerekir.
                $this->host,
                $this->username,
                $this->password);
            
                $this->connect->query('USE db_name'); //tablo ismini belirtebiliriz.
            
            if($this->connect){
              echo "Msql bağlantisi başarili.";
            }
            else{
                throw new Exception('MySQL baglanma hatasi'); 
            }
            
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function __destruct()
    {
        if($this->connect){

            $this->connect=null; //baglantiya null atayarak bilgileri kaldirilir.
            echo '<br>'."Veritabanı bağlantısı kesildi.";
        }
        else{
          echo"Veritabanı bağlantısı kesilemedi";
        }
    }
}

$baglanti = new Connect();

//ÇIKTI:
//Msql bağlantisi başarili.
//Veritabanı bağlantısı kesildi.
?>