<?php 

if(isset($_GET['addsubmit'])){
    $con = mysqli_connect("127.0.0.1", "root", "", "webdev1_database");
    if (mysqli_connect_errno()) 
    {
        echo "failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    
    $itemDesc = $_GET['inventory-desc'];
    $itemPrice = $_GET['inventory-price'];
    $itemQuantity = $_GET['inventory-quantity'];
    $itemSupplier = $_GET['inventory-supplier'];

    $searchQuery = "SELECT * FROM supplier WHERE supplier_name = '$itemSupplier'";
    $searchResult = mysqli_query($con, $searchQuery);

    $row = mysqli_num_rows($searchResult);

    if(mysqli_num_rows($searchResult) > 0)
    {
        $sql = "INSERT INTO inventory(item_desc, price, quantity, supplier_name) VALUES ('$itemDesc','$itemPrice','$itemQuantity','$itemSupplier')";
        $result = mysqli_query($con, $sql);
        header('Location: ./inventory_supplier_success.php ');
    }
    else
    {
        header('Location: ./inventory_supplier_fail.php ');
    }
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
</head>

<body>
    
<div class="table table-border">
    <div class="table-header">
        <h2 class="logo">thisPOS</h2>
        <button class="back-btn"><a id="back-link" href="./home.php">GO BACK TO MAIN PAGE</a></button>
    </div>

    <div class="table-div">
        <div class="notif-form">
            <form action="./addNew.php" method="GET" class="function-form php-form">
                <label>Item Name</label>
                <input type="text" name="inventory-desc" required>

                <label>Price</label>
                <input type="number" name="inventory-price" step="ANY" required>

                <label>Quantity</label>
                <input type="number" name="inventory-quantity" required>

                <label>Supplier Name</label>
                <input type="text" name="inventory-supplier" required>
                 
                <input name="addsubmit" type="submit" value="Insert" class="form-btn">
            </form>         
</div>
    </div>              
              
    </div>

    <?php 
            mysqli_free_result($searchResult);
            mysqli_free_result($result);
            mysqli_close($con);    
    ?>
</body>

</html>


<?php



?>