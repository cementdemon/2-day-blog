<?php


//code for some css on the page
echo '<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <style>
            body{font-family: Verdena; font-size: 20px; border: 0 solid black;
            text-align: center; width: 100%; padding: 20px;}
        </style>
    </head>
    <body class="dark-grey">';


//this makes the posts into files
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST["title"];
  $content = $_POST["content"];
  $picture = $_POST["picture"];
    
  $filename = "myblog1.html";
  $filename2 = "myblog2.html";
  $filename3 = "myblog3.html";
  $filename4 = "myblog4.html";
  $filename5 = "myblog5.html";

//delete's the last post
if (file_exists($filename5)) {
    unlink($filename5);
}
 
//change the name of the last post to count up
if (file_exists($filename4)) {
    rename ($filename4,$filename5);
} 

if (file_exists($filename3)) {
    rename ($filename3,$filename4);
}  
    
if (file_exists($filename2)) {
    rename ($filename2,$filename3);
}
if (file_exists($filename)) {
    rename ($filename,$filename2);
}


//blog created message   
createBlog($title, $content, $filename);
  echo '<br>
        <p>Blog created successfully!</p>
        <a href="index.php"><input type="button" naam="terug" value=" Go back to main page "  /></a>';
}

//function on submit
if(isset($_POST["submit"])) {
    $fotoNaam = basename($_FILES["picture"]["name"]);
    global $uploadsMap;
    
    function upload(){    
        global $uploadsMap;
        $uploadsMap = "uploads/";
        $uploadsMap = $uploadsMap . basename($_FILES["foto"]["name"]);
        $fotoType = pathinfo($uploadsMap, PATHINFO_EXTENSION);
    return true;
    }
}

//if the function upload gets used do the following
if (upload()) {
    //moves uploaded file from location
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $uploadsMap)) {
    $postFoto = $fotoNaam;
    fwrite($bestand,$postFoto,strlen($postFoto));
        
    //sanity check that everything went right
    if(fclose($bestand)) {
        echo "Account is aangemaakt.";
    }
    
    //for when it went wrong  
    else {
        echo "Probleem bij het uploaden. Foto niet geupload.";
    }
    }
}
    

    
//this decides how the post gets put into the file and how its printed
function createBlog($title, $content, $filename) {
    
$uploadsMap = "uploads/";
$uploadsMap = $uploadsMap . basename($_FILES["foto"]["picture"]);

    
    
  $handle = fopen($filename, 'w');
  $blogHTML = "<!DOCTYPE html>\n";
  $blogHTML .= "<html>\n";
  $blogHTML .= "<head>\n";
  $blogHTML .= "<title>$title</title>\n";
  $blogHTML .= "</head>\n";
    
  $blogHTML .= "<body>\n";
  $blogHTML .= "<div class='card-4 margin light-grey'>\n";
  $blogHTML .= "<img src='' alt='' style='width:100%'>";
  $blogHTML .= "<div class='container'>";
    
  $blogHTML .= "<h1>$title</h1>\n";
  $blogHTML .= "<p>$content</p>\n";

    
  $blogHTML .= "<div class='row'>";
  $blogHTML .= "</div></div></div>";
  $blogHTML .= "</body>\n";
  $blogHTML .= "</html>\n";
  fwrite($handle, $blogHTML);
  fclose($handle);
}


//code end
echo '   
    </body>
    </html>';
?>