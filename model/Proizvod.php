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
 
 

    }
    

   



?>