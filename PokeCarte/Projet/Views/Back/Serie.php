<?php if ($_GET["action"] == "SerieBack"){?>
<div id="listeSeries" class="table-responsive">
    <div class="series-section">
        <h2>Les séries japonaises</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <a href='./?action=AddSerie'>
                    <button class="btn add-btn">Ajouter une nouvelle série</button>
                </a>
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>image</th>
                    <th>stamp</th>
                    <th>idBloc</th>
                    <th>langue</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lesSeries as $uneSerie) { ?>
                <tr>
                    <td><?php echo $uneSerie->__get("id"); ?></td>
                    <td><?php echo $uneSerie->__get("nom"); ?></td>
                    <td><img src="<?php echo $uneSerie->__get("image"); ?>" alt="Image de la série"></td>
                    <td><img src="<?php echo $uneSerie->__get("stamp"); ?>" alt="Stamp de la série"></td>
                    <td><?php echo $uneSerie->__get("idBloc"); ?></td>
                    <td><?php echo $uneSerie->__get("langue"); ?></td>
                    <td>
                        <a href='./?action=SerieMaj&id=<?php echo $uneSerie->__get("id");?>'>
                            <button class="btn edit-btn">
                                <img src='./Image/Editer.png' alt="Éditer">
                            </button>
                        </a>
                        <a href='./?action=DelSerie&id=<?php echo $uneSerie->__get("id");?>'>
                        <button class="btn delete-btn" onclick="alert('La série a été supprimée')">
                            <img src='./Image/Corbeille.png' alt="Supprimer">
                        </button>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php } ?>

