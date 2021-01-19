<?php

    if(isset($_POST['submit'])){

        // check SKU
        if(empty($_POST['SKU'])){
            echo 'SKU is required <br />';
        } else {
            $SKU = $_POST['SKU'];
            if(!preg_match("/[A-Za-z0-9]+/", $SKU)){
                ECHO 'SKU must be letters and numbers only';
            }
        }
        // check name
        if(empty($_POST['name'])){
            echo 'Name is required <br />';
        } else {
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
                echo 'Name must be letters and spaces only';
            }
        }

        // check price
        if(empty($_POST['price'])){
            echo 'Price is required <br />';
        } else {
            $price = $_POST['price'];
            if(!preg_match('/^[0-9]+(\.[0-9]{2})?$/', $price)){
                echo 'Price must be numbers and . only';
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/headerAdd.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Add a Product</h4>
        <form class="white" action="add.php" method="POST">
            <label>SKU:</label>
            <input type="text" name="SKU">
            <label>Name:</label>
            <input type="text" name="name">
            <label>Price ($):</label>
            <input type="text" name="price">
            <!-- <label>Type Switcher</label>
            <br>
            <select multiple="multiple" name="typeSwitcher">
                <option value="DVD">DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select> -->
            <input type="submit" name="submit" value="SAVE" class="btn brand">
        </form>
    </section>

    
    <?php include('templates/footer.php'); ?>
    

</html>