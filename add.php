<?php

    $SKU = $name = $price = '';
    $errors = array('SKU'=>'', 'name'=>'', 'price'=>'');

    if(isset($_POST['submit'])){

        // check SKU
        if(empty($_POST['SKU'])){
            $errors['SKU'] =  'SKU is required <br />';
        } else {
            $SKU = $_POST['SKU'];
            if(!preg_match("/[A-Za-z0-9]+/", $SKU)){
                $errors['SKU'] = 'SKU must be letters and numbers only';
            }
        }
        // check name
        if(empty($_POST['name'])){
            $errors['name'] =  'Name is required <br />';
        } else {
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
                $errors['name'] = 'Name must be letters and spaces only';
            }
        }

        // check price
        if(empty($_POST['price'])){
            $errors['price'] = 'Price is required <br />';
        } else {
            $price = $_POST['price'];
            if(!preg_match('/^[0-9]+(\.[0-9]{2})?$/', $price)){
                $errors['price'] = 'Price must be numbers and . only';
            }
        }

        // if there are errors
        if(array_filter($errors)){
            // do nothing
        }
        else{
            header('Location: index.php');
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/headerAdd.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Add a Product</h4>
        <form class="white" action="add.php" method="POST">
            <div class="red-text"><label>SKU:</label>
                <?php echo $errors['SKU'] ?><input type="text" name="SKU" value="<?php echo htmlspecialchars($SKU) ?>">
            </div>
            <div class="red-text"><label>Name:</label>
                <?php echo $errors['name'] ?><input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
            </div>
            <div class="red-text"><label>Price:</label>
                <?php echo $errors['price'] ?><input type="text" name="price" value="<?php echo htmlspecialchars($price) ?>">
            </div>
            
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