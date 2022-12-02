<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/cart.css">
    <title>Keyshop - cart</title>
</head>
<body>
    <h1>Cart will appear here</h1>

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
                            <div class="TopDivs" ><a href="../index.php" > Shop </a></div>
                            <div class="TopDivs" >Payment</div>
                            <div class="TopDivs" >You are logged in as: ', $username, '</div>
                            <div class="TopDivs"> <a href="pages/loginPage.php"> Logout </a> </div> 
                        </div>';
                }else{
                    echo '<div id="TopContainer">
                            <div class="TopDivs" id="AdminPanel"><a href="adminPanel.php" > Admin Panel </a></div>
                            <div class="TopDivs" ><a href="../index.php" > Shop </a></div>
                            <div class="TopDivs" ><a href="payment.php" > Payment </a></div>
                            <div class="TopDivs" >You are logged in as: ', $username, '</div>  
                            <div class="TopDivs"> <a href="loginPage.php"> Logout </a> </div> 
                        </div>';
                    // ' + $username + '</div>';
                }
            }
            // renderCart();
            
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
    
    if(isset($_POST["removeProduct"])){
        $cartID = $_POST["cartId"];
        $userId = $_SESSION["userId"];
        $quantity = $_POST['quantity'];
        $removeProduct = "DELETE FROM cart WHERE cartId=$cartID;";
        // echo $removeProduct;
        runQuery($removeProduct);
        header("location:cart.php");
        // echo "<script>console.log('Item successfully removed!')</script";
    }
    if(isset($_POST["quantity"])){
        echo 'tsada';
        // echo $_POST["quantity"];
    }
    if(isset($_POST["flushCart"])){
        $query = "DELETE FROM cart WHERE userNo=$sessionUserId;";
        runQuery($query);
        header("location:cart.php");
    }
        
    
        $query = "SELECT cartId, productNo, quantity FROM cart WHERE userNo=$sessionUserId;";
        $recordsetCarts = getQuery($query);
        echo '<div class="productContainer">';
        
        $totalPrice = 0;
        if(!$column = mysqli_fetch_array($recordsetCarts)) echo 'Cart is empty';
        else
        while($column = mysqli_fetch_array($recordsetCarts))
        {
            $cartId = $column['cartId'];
            $productNo = $column['productNo'];
            $getProduct = "SELECT * FROM PRODUCT WHERE productId='$productNo';";
            // echo $getProduct;
            $recordsetProduct = getQuery($getProduct);
            while($column2 = mysqli_fetch_array($recordsetProduct)){
                // $productId = $column2["productId"];
                $name= $column2["name"];
                $image= "../" . $column2["imageURL"];
                $price= $column2["price"];
                $description= $column2["description"];
                $quantity = $column["quantity"];
                
                $priceCombined = $price * $quantity;
                $totalPrice += $priceCombined;
                $priceSeparated1 = number_format($priceCombined, 2, '.',',');
                $totalPrice = number_format($totalPrice, 2, '.',',');
                echo "
                <div class='product'>
                <form method='POST' action='cart.php'>
                <input type='hidden' name='cartId' value=$cartId ></input>
                    <img class='productURL' src=$image>
                        <div class='prices'>
                            <p class='productPriceCombined'> <b> Price:  $priceSeparated1 zł </b> </p>
                        </div>
                        <p class='productTitle'> <b>Title:</b> $name </p>
                        <div class='productFooter'>
                        <input type='number' onChange='CallChangePhp()' value=$quantity class='quantityProduct' name='quantity'> </input>
                        <input type='submit' class='btnRemoveProduct' name='removeProduct' value='Remove'> </input>
                    </div>
                </form>
                </div>
                
                ";
            }
        }
        echo "</div>";
        echo 
        "<div class='cartFooter'>
        <h2 class='totalPrice'>Total price: $totalPrice zł</h2>
        <form method='POST' action='cart.php'>
            <input type='submit' name='flushCart' class='flushCart' value='flush the cart'> </input>
            
        </form>
        </div>
        ";
    
?>
<!-- <script>
$(document).ready(function(){
    $('.quantity').on('change keyup', function() {
        console.log('nice');
    }); 
});
</script> -->
</body>
</html>