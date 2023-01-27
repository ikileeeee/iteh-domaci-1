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

        public static function dodaj($proizvod, $conn){
            $upit = "insert into proizvod(naziv,opis,cena,slika,kategorija_id) values('$proizvod->naziv','$proizvod->opis',$proizvod->cena,'$proizvod->slika',$proizvod->kategorija_id)";
            
            return $conn->query($upit);
        }
        public static function vrati($id, $conn){
            $upit = " select * from proizvod p inner join kategorija k on p.kategorija_id = k.kategorija_id where id=$id";
            return $conn->query($upit);
        }

    }
    

   



?>