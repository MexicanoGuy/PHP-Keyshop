<html>
<head>
    <title>KeyShop</title>
    <link rel="icon" href="src/key.png">
    <link rel="stylesheet" href="../styles/login.css"> 
</head>
<body>
    <div id="Container">
        <form method="POST" action="registerPage.php" autocomplete="off">
            <h1>Register here</h1>
            <input type="text" class="text" name="nickname" placeholder="nickname..."></input>
            <input type="text" class="text" name="email" placeholder="email..."></input>
            <input type="password" class="text" name="pwd" placeholder="password..." autocomplete="nope"></input>
            <input type="submit" id="submit" name="submit" value="Confirm"></input>
            <a href="loginPage.php" id="registerHref">Want to log in?</a>    
        </form>
        
    </div>
    
<?php
    if(isset($_POST['submit'])){
        Register();
    }  
    function Register(){
        $nickname = $_POST['nickname'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        if($email !== '' && $pwd !=='' && $nickname !==''){
            $findUser = "SELECT * FROM users where email='$email';";
            $recordset = getQuery($findUser);
            $rest = mysqli_fetch_array($recordset);
            $rest_email = $rest["email"];
            $hashedPwd = md5($pwd);
            echo $rest_email;
            if($rest_email ==''){
                $query = "INSERT INTO users(nickname,email,pwd) VALUES('$nickname','$email','$hashedPwd');";
                runQuery($query);
                $_SESSION['email'] = $email;
                $_SESSION['pwd'] = $pwd;
                $_SESSION["userId"] = $rest['userId'];
                header("location:loginPage.php");
            }else{
                echo "Account with given email already exists!";
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
    

?>
</body>
</html>