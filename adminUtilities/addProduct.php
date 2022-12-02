<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link rel='stylesheet' href='../styles/adminPanel.css'>
    <script src="https://cdn.tiny.cloud/1/lkkwv2va69gf87tq2ccmuqfs6fp41cx12nlvbamsepdrq8ik/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<?php
    echo '
    <div id="TopContainer">
        <div class="TopDivs" id="AdminPanel"><a href="adminPanel.php" > Admin Panel </a></div>
        <div class="TopDivs">Delete product</div>
        <div class="TopDivs">Edit product</div>  
        <div class="TopDivs">Change permissions</div> 
        <div class="TopDivs">System log</div> 
    </div>
    <form id="editor" action="addProduct.php">
        <table>
        <p>Name</p> <textarea type="text"></textarea>
        <p>Description</p> <input type="text" ></input>
        <p>Price</p> <input type="number" ></input>
        </table>
    </form>
    ';
?>
<script>
    tinymce.init({
        selector: "#editor",
        inline: true,
        menubar: true
    });
</script>
</body>
</html>