<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway:300i,400,700,700i" rel="stylesheet">
</head>

<body>
    <header>
        <a class="logo" href="index.html">Amazon</a>
    </header>

    <div class="navigation">
        <ul>
            <li><a href="browse.php">Browse</a></li>
            <li><a href="index.html">Sell</a></li>
        </ul>
    </div>
    <hr class="top">
    <div class="picture">
        <a class="header">Amazon</a>
        <br>
        <a class="slogan">"From A to Z"</a>
    </div>
    <hr class="bottom">
    <!--            <?PHP include "inc/navigation.php"?>-->
    <div class="info">
        <div class="bottomFrame">
            <h1 class="product">Browse Products</h1>
            <div class="descrip">
                <a class="description"> Below you will find a list of all the products we currently have within our database. However, you may only scroll through and look around. Any items you that have on sale will appear here as well. <a class="happy">Happy Searching!</a></a>
            </div>
        </div>
        <hr class="sep">
    </div>

    <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$servername = "sql9.freesqldatabase.com";
$username = "sql9281824";
$password = "DAIi1phm5w";
$dbname = "sql9281824";
$link = mysqli_connect($servername, $username, $password, $dbname);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM ProductInfo";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Product ID</th>";
                echo "<th>Product Name</th>";
                echo "<th>Product Description</th>";
                echo "<th>Made In</th>";
                echo "<th>Date Made</th>";
            echo "</tr>";
         
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr>";
                echo "<td>" . $row['ProductID'] . "</td>";
                echo "<td>" . $row['ProductName'] . "</td>";
                echo "<td>" . $row['ProductDescription'] . "</td>";
                echo "<td>" . $row['ProductMadeIn'] . "</td>";
                echo "<td>" . $row['ProductDateMade'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>

    <footer>&#169; Karl Achiles - Final Project</footer>
</body>

</html>
