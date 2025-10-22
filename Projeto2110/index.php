<!DOCTYPE html>
<html lang="en">
<head>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiosque</title>
    <link rel="stylesheet" type= "text/css" href="style.css">
    
</head>

<?php 
    //session_start(); 
    include("conexao.php");
?>

<body>



    
</div>
    
    <div class="containder">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                if (isset($_SESSION['status'])) {
                    echo "<h4>" . $_SESSION['status'] . "</h4>";
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card-mt-5">
                    
                    <div class="card-body">

     <section>  
   

         
           <form action="inserirCheck.php" method="post">    
                                                          
   
              <span class="padding-bottom--15" align="center">Entre na sua conta</span>
              <form id="stripe-login">

                <div class="field padding-bottom--24">
                  <label for="email">Nome</label>
                  <input type="text" name="name">
                </div>

                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="idade">Idade</label>
                  </div>
                  <input type="text" name="idade">
                            </div>

                <div class="field padding-bottom--24">
                  <label for="cpf">CPF</label>
                  <input type="text" name="cpf">
                </div>         

               

                <div class="field padding-bottom--salvar">
                  <input type="submit" name="submit" class="btn btn-primary" value="Salvar ">
                </div>


                





                
        </div>
      </div>
    </div>
  </div>















            </br>
                            


                            <nav class="navbar navbar-dark bg-dark">
                                <a class="navbar-brand" href="#"><center> Quiosque Morumbi TELEFONE: (11)5555-5555</h4> </a></center>
                            </nav>
                            <br>
                            <br>
                        </form>
                    
                </div>
            </div>
        </div>


        </form>
</div>

    </section>

       

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.js"
            integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</body>

</html>