
<?php
if ($uneCarte) {
    ?>
    <div id="listeDesBlocs" class="table-responsive">
        <table id="BlocLaTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>num</th>
                    <th>rarete</th>
                    <th>idSerie</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $uneCarte->__get("id"); ?></td>
                    <td><?php echo $uneCarte->__get("nom"); ?></td>
                    <td><?php echo $uneCarte->__get("numero"); ?></td>
                    <td><?php echo $uneCarte->__get("rarete"); ?></td>
                    <td><?php echo $uneCarte->__get("idSerie"); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php
} else {
    echo "<p>Série non trouvée.</p>";
}
?>


