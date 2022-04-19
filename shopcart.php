<?php
$title = "CART";
include('includes/header.php');
include('includes/database.php');
?>
    <h2 align="center">My Shopping Cart</h2>
<?php
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "Your shopping cart is empty.<br><br>";
    include ('includes/footer.php');
    exit();
}

//proceed since the cart is not empty
$cart = $_SESSION['cart'];
?>

    <table id='animals' align="center" frame="box" border="1px" cellpadding="20">
        <tr>
            <th style="width: 100px; font-size:15px">Image</th>
            <th style="width: 100px; font-size:15px">Description</th>
            <th style="width: 100px; font-size:15px">Price</th>
            <th style="width: 100px; font-size:15px">Quantity</th>
            <th style="width: 100px; font-size:15px">Total</th>
        </tr>
        <?php
        // code to display the shopping cart content
        //select statement
        $sql="SELECT image,Item_id, Description, Price FROM item WHERE 0";
        foreach (array_keys($cart) as $id) {
            $sql .= " OR animal_id=$id";
        }

        //execute the query
        $query = $dbcon->query($sql);

        while (($row = $query -> fetch_assoc()) != NULL) {
            $image = $row['image'];
            $id = $row['Item_id'];
            $description = $row['Description'];
            $price = $row['Price'];
            $qty = $cart[$id];
            $total = $qty * $price;
            echo "<tr>";
            echo "<td><img src='ItemsImages/", $image, "' alt='Item image' width='50px'></td>";
            echo "<td><a href='animaldetails.php?id=$id'>$description</a></td>";
            echo "<td>$$price</td>";
            echo "<td>$qty</td>";
            echo "<td>$$total</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="bookstore-button" align="center">
        <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
    </div>
    <br><br>

<?php
include ('includes/footer.php');