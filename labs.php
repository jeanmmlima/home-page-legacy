<!DOCTYPE html>
<html lang='pt-br'>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    
  <!-- Metadata: site definitions -->
  <meta name='url' content='http://www.dca.ufrn.br/~jean/'>
  <meta name='copyright' content='© 2019 DCA-UFRN: www.dca.ufrn.br/~jean<http://www.dca.ufrn.br/~jean/>'>
  <meta name='description' content='Página Pessoal de Jean Mário Moreira de Lima, Engenheiro do Departamento de Engenharia de Computação e Automção (DCA) da Universidade Federal do Rio Grande do Norte (UFRN).'>
  <meta name='author' content='Eng. Jean Mário Moreira de Lima'>
    
    <!-- Metadata: search bots -->
  <meta name='Robots' content='Index,Follow'>
  <meta name='rating' content='general'>
  <meta name='keywords' content='dca, departamento de engenharia de computação e automação, ufrn, universidade federal do rio grande do norte, engenharia de computação, engenharia mecatrônica, automação, petróleo, robótica, controle de processos, sistemas distribuídos, sistemas inteligentes, sistemas de controle'>

  <!-- Title -->
  <title>Página pessoal de Jean Mário Moreira de Lima</title>

  <!-- Favicon -->
  <link rel='shortcut icon' type='image/gif' href='img/DCAicon.gif'>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/  font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <link rel='stylesheet' type='text/css' href='css/meu_stilo.css'>

</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
       <!-- <a class="navbar-brand" href="#">Logo</a> -->
        <!-- DCA LOGO -->
                <a href='#'>
                  <div class='dca container_logo'>
                    <article class='dca caption'>
                      <div class='dca container_line'>
                        <div class='dca line'></div>
                        <div class='dca line'></div>
                        <div class='dca line'></div>
                        <div class='dca line'></div>
                        <div class='dca line'></div>
                        <div class='dca line'></div>
                        <div class='dca line'></div>
                      </div>
                      <div class='dca overlay'>
                        <h1>D<span>C</span>A</h1>
                      </div>
                    </article>
                  </div>
                </a>

      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <!-- <li class="active"><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Projects</a></li>
          <li><a href="#">Contact</a></li>
        -->
        </ul>
        <ul class="nav navbar-nav navbar-right">

        </ul>
      </div>
    </div>
  </nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
      <div class="col-sm-1 sidenav">

      </div>
      <div class="col-sm-10 text-left"> 
        <div class="row">
            <div class='profile'>



            </div>
          <div class='col-lg-8 col-md-8 col-sm-8'>

           
             <?php 

              function addgrupo($id_grupo,$descricao_grupo, $descricao_turma) {
                  echo "<option value=\"" . $id_grupo . "\">" . $descricao_grupo . " - " . $descricao_turma . "</option>";
              }

              function addhorario($id_horario,$descricao_horario){
                  echo "<option value=\"" . $id_horario . "\">" . $descricao_horario . "</option>";
              }

              function pegouvalor(){
                echo "<br><p> " . $_POST["grupo"] . "</p>";
              }

              function bdConnect(){

                    $servername = "localhost";
                    $username = "user";
                    $password = "#Senha123#";
                    $dbname = "teste";
                    $count = 0;

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    echo "<br> Connected successfully to $dbname database <br>";
                    return $conn;
              }

              function insertReserva($grupo,$horarios,$data){
                //insert into database

                $conn = bdConnect();
                $sql = "INSERT INTO reserva (id_grupo,id_horarios,ativo,data) VALUES (" . $grupo . ", " . $horarios . ", 1, '" . $data . "')";

                if ($conn->query($sql) === TRUE) {
                    echo "<br>New record created successfully<br>";
                } else {
                    echo "<br>Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
              }



             ?>

             <?php
              // define variables and set to empty values
              $grupoErr = $horariosErr = $dataErr = "";
              $grupo = $horarios = $data = "";

              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["grupo"])) {
                  $grupoErr = "Grupo is required";
                } else {
                  $grupo = test_input($_POST["grupo"]);
                }
                
                if (empty($_POST["horarios"])) {
                  $horariosErr = "Horario is required";
                } else {
                  $horarios = test_input($_POST["horarios"]);
                  
                }
                  
                if (empty($_POST["data"])) {
                  $data = "";
                } else {
                  $data = test_input($_POST["data"]);
                  
                }

                insertReserva($grupo,$horarios,$data);

              }


              function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
            ?>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

             <?php 
                    
                    $conn = bdConnect();

                    $sql = "SELECT * FROM grupo";

                    $result = $conn->query($sql);
                    

                    if ($result->num_rows > 0) {
                      // output data of each row
                      
                      echo "\t\t\tGrupo: <select name=\"grupo\">\r\n";
                      while($row = $result->fetch_assoc()) {  
                        
                      addgrupo($row["id"],$row["descricao"],$row["descricao"]);

                      } 
                      echo "\t\t\t</select>\r\n";
                      
                    } else {
                      echo "0 results";
                    }

                    $sql = "SELECT * FROM horarios";

                    $result = $conn->query($sql);
                    

                    if ($result->num_rows > 0) {
                      // output data of each row
                      
                      echo "\t\t\t Horário: <select name=\"horarios\">\r\n";
                      while($row = $result->fetch_assoc()) {  
                        
                      addhorario($row["id"],$row["descricao"]);

                      } 
                      echo "\t\t\t</select>\r\n";
                      
                    } else {
                      echo "0 results";
                    }

                    $conn->close();
                    echo"<br>Data: <input type=\"date\" name=\"data\">";
                    echo "<br><input type=\"submit\" value=\"Confirmar\">";
                    echo "</form>\r\n";

              ?>

              <?php
                echo "<br><h2>Entradas:</h2><br>";
                echo $grupo;
                echo "<br>";
                echo $horarios;
                echo "<br>";
                echo $data;
                echo "<br>";



              ?>


    </div>


      </div>
      </div>
     <div class="col-sm-1 sidenav">

     </div>
  </div>
</div>

<!-- 
      # FOOTER / RODAPE
    -->  
    <footer id='footer'>
      <div class='container wow fadeInLeftBig'>
        <div class='row'>
          <div class='col-lg-2 col-md-2 col-sm-2'>
            <div class='logo'>
              <img src='img/brasao-ufrn.png' alt='UFRN Logo'>
            </div>
          </div>
          <div class='col-lg-10 col-md-10 col-sm-10'>
            <div class='institution'>
              <p><span>Departamento de Engenharia de Computação e Automação</span><br>
              Universidade Federal do Rio Grande do Norte - Centro de Tecnologia</p>
              <address class='contact-info'>
                <p><span class='fa fa-map-marker'></span>UFRN Campus Universitário Lagoa Nova - 59078-970 - Natal/RN - BRASIL</p>
                <p><span class='fa fa-phone'></span>+55 (84) 3342-2231 (ext 220 ou 200)</p>
              </address>
            </div>
          </div>
        </div>
      </div>
    </footer>

</body>
</html>