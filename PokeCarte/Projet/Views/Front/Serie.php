<?php
if ($uneSerie) {
    ?>
    <div id="listeDesBlocs" class="table-responsive">
        <table id="BlocLaTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>idBloc</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $uneSerie->__get("id"); ?></td>
                    <td><?php echo $uneSerie->__get("nom"); ?></td>
                    <td><?php echo $uneSerie->__get("idBloc"); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php
} else {
    echo "<p>Série non trouvée.</p>";
}
?>

<div id="listeCartes" class="cartes-container">
    <?php foreach ($lesCartes as $uneCarte) { ?>
        <div class="carte">
            <a href='./?action=detailCarte&id=<?php echo $uneCarte->__get("id");?>'><img src="<?php echo $uneCarte->__get("image"); ?>" alt="Image"></a>
        </div>
    <?php } ?>
</div>
