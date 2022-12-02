<html>
<head>
    <title>KeyShop</title>
    <link rel="icon" href="../src/key.png">
    <link rel="stylesheet" href="../styles/login.css"> 
</head>
<body>
    <div id="Container">
        <form method="POST" action="loginPage.php" autocomplete="off">
            <h1>Login here</h1>
            <input type="text" class="text" name="email" placeholder="email..."></input>
            <input type="password" class="text" name="pwd" placeholder="password..." ></input>
            <input type="submit" id="submit" name="submit" value="Submit"></input>
            <a href="registerPage.php" id="registerHref">Want to register?</a>
        </form>
        
    </div>
    
<?php
    session_start();
    if(isset($_POST['submit'])){
        RequestLogin();
    } 
    function RequestLogin(){
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        if($email !== '' && $pwd !==''){
            $data = getQuery("SELECT * FROM users WHERE email='$email';");
            $column = mysqli_fetch_array($data);

            if(!empty($column))
            if($column["pwd"] == md5($pwd) && $column["email"] == $email){
                $_SESSION['login'] = $column['username'];
                $_SESSION['email'] = $email;
                $_SESSION['pwd'] = $pwd;
                $_SESSION["userId"] = $column['userId'];
                $_SESSION['status'] = true;
                header("location:../index.php");
            }
            else{
                echo "The given credentials are wrong!";
            }
        }
        
    }
    
    
    function runQuery($qu){
        $host = "localhost";
        $user = "root";
        $pwd = "";
        $db = "keyshop";
        $connection = mysqli_connect($host,$user,$pwd,$db) or die("No connection!");
        mysqli_set_charset($connection, "UTF8");

        $return = mysqli_query($connection, $qu) or die("Query cannot be loaded!");
        mysqli_close($connection);
        
    }
    function getQuery($qu){
        $host = "localhost";
        $user = "root";
        $pwd = "";
        $db = "keyshop";
        $connection = mysqli_connect($host,$user,$pwd,$db) or die("No connection!");
        mysqli_set_charset($connection, "UTF8");

        $return = mysqli_query($connection, $qu) or die("Query cannot be loaded!");
        mysqli_close($connection);
        return $return;
    }

    
    // $recordset = runQuery("SELECT * FROM product", $connection);

    // echo "<div id='productContainer'>";
    // while($column = mysqli_fetch_array($recordset))
    // {
    //     $productId = $column["productId"];
    //     $name= $column["name"];
    //     $image= $column["imageURL"];
    //     $price= $column["price"];
        
    //     echo "<div class='product'>";
    //     echo "<h1> Product $name </h1>";
    //     echo "<img class='productURL' src=$image>";
    //     echo "<h3> Price $price </h3>";
    //     echo "<button class='btnAddProduct' onClick='addProduct($productId)'>Add</button>";
    //     echo "</div>";
    // }
    // echo "</div>";
    // mysqli_close($connection);

?>
</body>
</html>