<table class="table">
    <tr>
        <th></th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
    </tr>
    <?php
    $priceTotal = 0.00;
    foreach ($cart as $product) {
        echo "<tr>";
        echo "<td><img class='img-table' src='img/".$product->getImage()."'></td>";
        echo "<td>".$product->getName()."</td>";
        echo "<td>".$product->getDescription()."</td>";
        echo "<td>".$product->getPrice()." €</td>";
        echo "</tr>";
        $priceTotal = $priceTotal + $product->getPrice();
    }
    ?>
    <tr>
        <th></th>
        <th></th>
        <th>total price:</th>
        <th><?php echo $priceTotal; ?> €</th>
    </tr>
</table>
