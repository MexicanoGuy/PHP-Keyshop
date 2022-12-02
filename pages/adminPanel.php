<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../styles/adminPanel.css'>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/inline/ckeditor.js"></script>
    <title>Keyshop - Admin Panel</title>
</head>
<body>
    <div id="TopContainer">
        <div class="TopDivs" id="AdminPanel"><a href="adminPanel.php" > Admin Panel </a></div>
        <div class="TopDivs"><a href="../adminUtilities/addProduct.php"> Add product</a></div>
        <div class="TopDivs"><a href="../adminUtilities/deleteProduct.php"> Delete product</a></div>
        <div class="TopDivs"><a href="../adminUtilities/editProduct.php"> Edit product </a></div>  
        <div class="TopDivs"><a href="../adminUtilities/changePermissions.php"> Change permissions </a></div> 
        <div class="TopDivs"><a href="../adminUtilities/systemLog.php"> System log </a></div> 
    </div>
    <form id='editor'>
        <p>Name</p> <input type='text'></input>
        <p>Description</p> <input type='text' ></input>
        <p>Price</p> <input type='text' ></input>
        
    </form>
<script>
    InlineEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    })
    .then
</script>

</body>
</html>