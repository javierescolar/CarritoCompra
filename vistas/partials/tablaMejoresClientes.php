<br><br>
<h3 class="text-center">Top 10 Buyers</h3>
<table class="table table-responsive">
    <tr>
        <th>NAME</th>
        <th>USERNAME</th>
        <th>BUYS</th>
    </tr>
    <?php
    foreach($mejoresClientes as $cliente){
        echo "<tr>";
        echo "<td>".$cliente['name']."</td>";
        echo "<td>".$cliente['username']."</td>";
        echo "<td>".$cliente['compras']."</td>";
        echo "</tr>";
    }
    ?>
</table>