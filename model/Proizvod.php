<?php
    class Proizvod{
        private $id;
        private $naziv; 
        private $opis; 
        private $cena; 
        private $kategorija_id; 

        private $slika; 

        public function __construct($id=null, $opis=null, $cena=null, $kategorija_id=null, $naziv=null, $slika=null){
            $this->naziv=$naziv;
            $this->id=$id;
            $this->opis=$opis;
            $this->cena=$cena;
            $this->slika=$slika;

            $this->kategorija_id=$kategorija_id; 
        }
 
        public static function vratiSveProizvode($conn){
            $upit = "select * from proizvod p inner join kategorija k on k.kategorija_id=p.kategorija_id";
            return $conn->query($upit);
        }
        public static function obrisi($id, $conn){
            $upit = " delete from proizvod where id=$id";
            return $conn->query($upit);
        }



    }
    

   



?>