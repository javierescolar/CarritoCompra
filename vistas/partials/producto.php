
<div class="col-md-6">
    <br>
    <div class="col-md-8">
        <img class="img img-responsive"src="img/<?php echo $producto->getImage(); ?>">
    </div>
    <div class="col-md-4">
        <h4><?php echo $producto->getName(); ?></h4>
        <p><?php echo $producto->getDescription(); ?></p>
        <p><b><?php echo $producto->getPrice(); ?> €</b></p>
        <div class="form-group">
            <label for="producto">unit/s:</label>
            <select name="producto[<?php echo $producto->getId(); ?>]" class="form-control">
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
        </div>
        
    </div>
    <br>
</div>
