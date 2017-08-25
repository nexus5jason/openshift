        <?
            // Create connection
            $conn = mysqli_connect("localhost", "webadmin", "webadmin", "webDB");
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<!-- bootstrap css link   -->   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<!-- animate css link -->    
    <link rel="stylesheet" type="text/css" media="all" href="./css/animate.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> 
<!-- google font css link -->     
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan" rel="stylesheet">      
    

  <link rel="icon" href="./img/favicon.ico">
  
  <title>Web development</title>
</head>
<body>
    <header>
        <div class="jumbotron">
            <div class="container">
                <h1 class="option animated zoomIn" style="font-family: 'Baloo Bhaijaan', cursive;font-size: 70px;" >
                Web Resource</h1>
                <p style="color:grey;">This site is to deliver the brief information on how to build up web sites and skills needed for it. You will briefly understand what coding technics are commonly used for web development and can set up your roadmap to study for it</p>                
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Start, Now. &raquo;</a></p>
            </div>
        </div>    
    </header>  

    <div class="container">
      <div class="row">
        <div class="col-md-4">
            <ul>

            <?
                $sql = "SELECT id, title FROM contents";
                $result = mysqli_query($conn, $sql);           
                while($row = mysqli_fetch_assoc($result)){
                  echo '<li><a href="./index.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
                }
            ?>        
  
            </ul>
        </div>
        <div class="col-md-6">        
        <?
            if (empty($_GET['id'])) {
                null;
            } else {
                  $sql = 'SELECT title, description FROM contents WHERE id='.$_GET['id'];
                  $result = mysqli_query($conn, $sql);
                
                  while($row = mysqli_fetch_assoc($result)) {
                      echo '<h2>'.$row['title'].'</h2>';
                      echo $row['description'];
                  }

            } 
        ?>
        </div>
      </div>
    </div>
    
    
    <br/><br/><br/>
    <hr>
    <footer>
        <p align='center'>&copy; Site design is from Bootstrap.com, 2017</p>
    </footer>
    
</body>
</html>

        <?
                mysqli_close($conn);
        ?>
