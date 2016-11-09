<br><br>
<h3 class="text-center">10 latest purchases</h3>
<table class="table table-responsive">
    <tr>
        <th>PRODUCT</th>
        <th>PRICE</th>
    </tr>
    <?php
    $carro = 0;
    $idCarrito = 0;
    foreach ($ultimasCompras as $key => $carrito) {
        if ($idCarrito != $carrito['idCarrito']) {
            if ($key != 0) {
                echo "<tr>";
                echo "<th>TOTAL:</th>";
                echo "<th>" . $total . "</th>";
                echo "</tr>";
            }
            $idCarrito = $carrito['idCarrito'];
            $carro++;
            echo "<tr>";
            echo "<td colspan='2' style='background-color:#848484;color:white'>Cart " . $carro . "</td>";
            echo "</tr>";
            $total = 0.00;
        }
        echo "<tr>";
        echo "<td>" . $carrito['name'] . "</td>";
        echo "<td>" . $carrito['price'] . "</td>";
        echo "</tr>";
        $total = $total + $carrito['price'];
        if ($key == 9) {
            echo "<tr>";
            echo "<th>TOTAL:</th>";
            echo "<th>" . $total . "</th>";
            echo "</tr>";
        }
    }
    ?>
</table>

