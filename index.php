<html>
<head>
    <title>KeyShop</title>
    <link rel="icon" href="src/key.png">
    <link rel="stylesheet" href="./styles/index.css"> 
</head>
<body>
    <h1 id="Welcomeh1">Welcome to the KeyShop!</h1>
    
        <?php
            session_start();
            function _isset(){
                return isset($_SESSION["status"]);
            }
            $thist = _isset();
            $emp = empty($_SESSION["status"]);
            if($emp == 1){
                header("location:pages/loginPage.php");
            } 
        ?>
        <?php
            $sessionEmail = $_SESSION["email"];
            $sessionUserId = $_SESSION["userId"];
            $sessionPwd = $_SESSION["pwd"];
            $recordsetUserType = getQuery("SELECT * FROM users WHERE email='$sessionEmail'");
            $column = mysqli_fetch_array($recordsetUserType);
            $userType = $column["accountType"];
            $username = $column["nickname"];
            
            if(isset($_SESSION["status"])){
                if($userType == 'user'){
                    echo '<div id="TopContainer">
                            <div class="TopDivs" ><a href="pages/cart.php" > Your Cart </a></div>
                            <div class="TopDivs" >Payment</div>
                            <div class="TopDivs" >You are logged in as: ', $username, '</div>
                            <div class="TopDivs"> <a href="pages/loginPage.php"> Wanna switch account? </a> </div> 
                        </div>';
                }else{
                    echo '<div id="TopContainer">
                            <div class="TopDivs" id="AdminPanel"><a href="pages/adminPanel.php" > Admin Panel </a></div>
                            <div class="TopDivs" ><a href="pages/cart.php" > Cart </a></div>
                            <div class="TopDivs" ><a href="pages/payment.php" > Payment </a></div>
                            <div class="TopDivs" >You are logged in as: ', $username, '</div>  
                            <div class="TopDivs"> <a href="pages/loginPage.php"> Logout </a> </div> 
                        </div>';
                    // ' + $username + '</div>';
                }
            }
            
            
        ?>
    
<?php
    function logOut(){
        $_SESSION['status'] == '';
        $_SESSION['pwd'] == '';
        $_SESSION['email'] == '';
        $_SESSION['nickname'] == '';
        $_SESSION["userId"] == '';
        header('location:pages/loginPage.php');
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
    
    if(isset($_POST["addProduct"]) && isset($_POST["quantity"])){
        $prId = $_POST["productId"];
        $userId = $_SESSION["userId"];
        $quantity = $_POST['quantity'];

        //CHECK IF PRODUCT IS ALREADY IN CART
        $query1 = "SELECT * FROM cart where userNo='$userId' AND productNo='$prId'";
        $res = getQuery($query1);
        $row = mysqli_fetch_array($res);
        if(!$row) {
            $addProduct = "INSERT INTO cart (productNo,userNo,quantity) VALUES($prId, $userId, $quantity);";
            runQuery($addProduct);
        }else{
            echo '<script>alert("Selected product has already been added before!")</script>';
        }
    }
    $recordsetProduct = getQuery("SELECT * FROM product");
    echo '<div class="productContainer">';

    while($column = mysqli_fetch_array($recordsetProduct))
    {
        $productId = $column["productId"];
        $name= $column["name"];
        $image= $column["imageURL"];
        $price= $column["price"];
        $description= $column["description"];
        
        echo "
        <div class='product'>
        <form method='POST' action='index.php'>
        <input type='hidden' name='productId' value=$productId ></input>
            <img class='productURL' src=$image>
                
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star checked'></span>
                <span class='fa fa-star'></span>
                <span class='fa fa-star'></span>

                <p class='productTitle'> <b>Title:</b> $name </p>
                <p class='productDesc'> $description </p>
                <p class='productPrice'> <b>Price:</b>  $price zł</p>
            <div class='productFooter'>
            <input type='number' value=1 class='quantityProduct' name='quantity'></input>
            <input type='submit' class='btnAddProduct' name='addProduct' value='Add'> </input>
            </div>
        </div>
        </form>";
    }
    echo "</div>";
    

?>
</body>
</html>