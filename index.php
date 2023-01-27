
<?php
    include 'config.php'; //moramo zbog $conn
    include 'model/Proizvod.php';  
    include 'model/Kategorija.php';

    $sviproizvodi = Proizvod::vratiSveProizvode($conn);

    $kategorije = Kategorija::vratiSveKategorije($conn); //potrebno da bismo mogli da ucitamo sve kategorije u modalu za dodavanje 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <div      style="margin-left: 25%;margin-right: 25%;">                    
                        <input type="search" id="pretraga" class="form-control"    onkeyup="pretragaPoImenu()"    placeholder="Search.." />
                       
                    
                      
                      
                      <button type="button" class="btn btn-warning"  onclick="sortiraj()">Sortiraj<i class="fa fa-sort" aria-hidden="true" ></i></button>
                      <select name="kriterijum" id="kriterijum" class="criteria">
                          <option value="price">Cena</option> 
                          <option value="name">Naziv</option>
                    </select>


                  
                 
          </div>
    <div class="pocetna">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Dodaj novi proizvod</button>
                <table class="table" id="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Naziv</th>
                <th scope="col">Kategorija</th>
                <th scope="col">Cena</th>

                <th scope="col">Opcije</th>
                
                </tr>
            </thead>
            <tbody>
                <?php  while($red = $sviproizvodi->fetch_array()):   ?>
                        <tr>
                            <th  >   <?php   echo $red['id'];        ?>     </th>
                            <td> <?php   echo $red['naziv'];        ?> </td>
                            <td> <?php   echo $red['naziv_kategorije'];        ?> </td>
                            <td> <?php   echo $red['cena'];        ?> </td>

                            <td><button type="button" class="btn btn-danger" onclick="obrisi(<?php echo   $red['id'];?>)">Obrisi</button>
                            <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#profileModal" onclick="prikazi(<?php echo   $red['id'];?>)"      >Detalji</button></td>
                        </tr>


                <?php endwhile;?>
              
            </tbody>
            </table>
 

    </div>


    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"   aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Dodaj proizvod</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     


      <form   class="sign-in-form" id="addForm" name="addForm" method="POST" enctype="multipart/form-data" >
        <div class="modal-body">
           
      

        
         
        <div class="input-field">
           
            <input type="text" placeholder="Naziv.." name="naziv" id="naziv" required />
        </div>
        <div class="input-field">
           
            <input type="text" placeholder="Opis.." name="opis" id="opis" required />
        </div>
        <div style="font-size:20px" >
            <label for="kategorije">Odaberi kategoriju</label>
            <select name="kategorije" id="kategorije">
            <?php
                 
                while($red = $kategorije->fetch_array()): 
                ?>
                  <option value=<?php echo $red["kategorija_id"]?>><?php echo $red["naziv_kategorije"]?></option> 

                <?php   endwhile;   ?>
            </select>
        </div>
        <div class="input-field">
           
            <input type="text" placeholder="Cena.." name="cena" id="cena" required />
        </div>
       <br>
     
        <div style="font-size:20px;margin:0px">
            <p> Odaberi sliku proizvoda</p>
            
            <input type="file" class="form-control" id="slika" name="slika"    >
   
        </div> 

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" onclick="dodaj()" >Submit</button> 
        </div>
 

      </form>
    </div>
  </div>
</div>
 







 
       <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content">

            <!--Header-->
            <div class="modal-header" >
                <img src="" alt="avatar" id="slikaPreview" class="rounded"  style="margin-left: auto;margin-right: auto; width: 180px;height: auto;"  >
            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">

                <h5 class="mt-1 mb-2" id="nazivPreview"></h5>

                <div class="md-form ml-0 mr-0" style="text-align: center;">
                <p id="opisPreview">   </p>
                <i id="cenaPreview" class="fa fa-tag"  aria-hidden="true"></i>
                    <br>
            
                </div>

        <div class="text-center mt-4">
           


        </div>
      </div>


      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         
        </div>




    </div>
    <!--/.Content-->
  </div>
</div>
 




































    <script src="js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


</body>
</html>