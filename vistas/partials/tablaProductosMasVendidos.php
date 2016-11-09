<br><br>
<h3 class="text-center">Top 5 Products</h3>
<table class="table table-responsive">
    <tr>
        <th></th>
        <th>PRODUCTO</th>
        <th>TIMES SOLD</th>
    </tr>
    <?php
    foreach($productosMasVendidos as $producto){
        echo "<tr>";
        echo "<td><img class='img-table' src='img/".$producto['image']."'></td>";
        echo "<td>".$producto['name']."</td>";
        echo "<td>".$producto['timesSold']."</td>";
        echo "</tr>";
    }
    ?>
</table>