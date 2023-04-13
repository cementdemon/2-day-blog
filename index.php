
<!DOCTYPE html>
<html>
<head>
<title>P1 blog</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">

<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="dark-grey">

<!-- content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="content" style="max-width:1400px">

<!-- Header -->
    
<div class="header-login">
    
</div>  
    
    
<header class="container center padding-32">
        <h1><b>P1</b></h1>
        <p>Welcome to the blog of <span class="tag">Marcel Miedema</span></p>
</header>
    
  


<!-- Grid -->
<div class="row">

<!-- Blog entries -->
<div class="col l8 s12">
  <!-- Blog entry -->
  <div class="card-4 margin light-grey">
    <!--<img src="images/F1%20Header%20PIcture.jpg" alt="main image" style="width:100%">-->
    <div class="container">
        
<?php session_start(); if (isset($_SESSION['loggedin'])) {   
    echo '  <br><h4>
            Welcome to the official P1 blog.<br>
            here you are allowed to look at and make blogposts.</h4><br>
            <b><a class="header-login" href="blogs.html">make a blog post</a></b>
            <div style="text-align:right">
            <a class="log-out" href="uitloggen.php">log uit</a>
            </div>
            <br><br>
            ';
} 
        
else {   
    echo '
    <h3><b>welcome to the P1 blog!</b></h3>

    <div class="container">
      <h4>If you want to be able to make a blog post on our website then please register and log in with the following link below.</h4>
        <b><a class="header-login" href="inloggen.html">login</a></b>
    </div><br>
     ';
}    
    
?>        


    </div>
  </div>
  <hr>

  <!-- a loop that displays the blog entry's -->
    
<!-------------------------------------------------------------------------------------------------------------------------------------------->
    
<?php
    for ($x=1; $x<6;$x++)
    echo file_get_contents("myblog$x.html");
?>

<!-------------------------------------------------------------------------------------------------------------------------------------------->
  

  <div class="card-4 margin light-grey">
  <img src="images/F1%20Header%20PIcture.jpg" alt="F1" style="width:100%">
    <div class="container">
      <h3><b>2022 recap</b></h3>
      <h5>Title description, <span class="opacity">April 2, 2014</span></h5>
    </div>

    <div class="container">
      <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed
        tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      <div class="row">

      </div>
    </div>
  </div>

<!-------------------------------------------------------------------------------------------------------------------------------------------->
    
<!-- END BLOG ENTRIES -->
</div>

<!-- Introduction menu -->
<div class="col l4">
  <!-- About Card -->
  <div class="card margin margin-top">
  <img src="images/Schermafbeelding%202023-04-11%20140050.png" style="width:100%">
    <div class="container white">
      <h4><b>Welcome to the official P1 blog</b></h4>
      <p>This is the official P1 blog which is about the latest F1 related news filled with facts, info and discusions with fellow F1 fans
         </p>
    </div>
  </div><hr>
  


  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END content -->
</div>



</body>
</html>
