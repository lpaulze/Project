<?php if ($_GET["action"] == "SerieMaj") { ?>
<h2>Modifier une Série</h2>
<form action="./?action=SerieMaj&id=<?= $uneSerie->__get('id'); ?>" method="POST" enctype="multipart/form-data">

    <label for="modif-nom">Nom</label>
    <input id="modif-nom" type="text" name="nom" value="<?= $uneSerie->__get('nom'); ?>" /><br>

    <!-- Image cliquable pour changer le logo -->
    <label for="logoInput" class="image-label">
        <img src="<?= $uneSerie->__get('image'); ?>" alt="Image de la série" id="current-logo">
        <span>Ajouter Logo</span>
    </label>
    <input type="file" id="logoInput" accept="image/*" style="display: none" name="image">

    <!-- Image cliquable pour changer le stamp -->
    <label for="stampInput" class="image-label">
        <img src="<?= $uneSerie->__get('stamp'); ?>" alt="Stamp de la série" id="current-stamp">
        <span>Ajouter Stamp</span>
    </label>
    <input type="file" id="stampInput" accept="image/*" style="display: none" name="stamp">

    <!-- Sélection de la langue -->
    <label for="modif-langue">Langue</label>
    <select id="modif-langue" name="langue">
        <option value="<?= $uneSerie->__get('langue'); ?>" selected>
            <?= $uneSerie->__get('langue'); ?> 
        </option>
        <?php if ($uneSerie->__get('langue') === "jap") { ?>
            <option value="fr">fr</option>
        <?php } else { ?>
            <option value="jap">jap</option>
        <?php } ?>
    </select>

    <!-- Sélection du Bloc -->
    <label for="modif-idBloc">Bloc</label>
    <select id="modif-idBloc" name="idBloc">
        <!-- Option actuelle de la série sélectionnée -->
        <option value="<?= $uneSerie->__get('idBloc'); ?>" selected>
            <?= $unNomBloc->__get('nom'); ?>
        </option>
        <!-- Affichage des autres blocs -->
        <?php foreach ($lesBlocs as $unBloc) { ?>
            <?php if ($unNomBloc->__get('nom') !== $unBloc->__get('nom')) { ?>
                <option value="<?= $unBloc->__get('id'); ?>">
                    <?= $unBloc->__get('nom'); ?>
                </option>
            <?php } ?>
        <?php } ?>
    </select>

    <div>
        <input type='submit' name="modifier" value='Modifier' />
    </div>
</form>
<?php } ?>


<?php if ($_GET["action"] == "AddSerie"){?>
<h2>Ajouter une Série</h2>
<form action="./?action=AddSerie" method="POST" enctype="multipart/form-data">

    <label for="modif-nom">Nom</label>
    <input id="modif-nom" type="text" name="nom"/><br>

    <!-- Image cliquable pour changer le logo -->
    <label for="logoInput" class="image-label">
        <img src="" alt="Selectionnez un Logo" id="current-logo">
        <span>Changer Logo</span>
    </label>
    <input type="file" id="logoInput" accept="image/*" style="display: none" name="image">

    <!-- Image cliquable pour changer le stamp -->
    <label for="stampInput" class="image-label">
        <img src="" alt="Selectionnez un Stamp" id="current-stamp">
        <span>Changer Stamp</span>
    </label>
    <input type="file" id="stampInput" accept="image/*" style="display: none" name="stamp">

    <label for="modif-langue">Langue</label>
    <select id="modif-langue" name="langue">
        <option value="">-- Sélectionnez une langue --</option> 
        <option value="fr">fr</option>
        <option value="jap">jap</option>
    </select>

    <label for="modif-idBloc">Bloc</label>
    <select id="modif-idBloc" name="idBloc">
    <option value="">-- Sélectionnez une un Bloc --</option>
    <!-- Parcours de la liste des blocs pour afficher toutes les options -->
    <?php foreach ($lesBlocs as $uneBloc){ ?>
        <option value="<?= $uneBloc->__get('id'); ?>">
            <?= $uneBloc->__get('nom'); ?> <!-- Affiche le nom du bloc -->
        </option>
    <?php } ?>
    </select>
 
    <?php if (!empty($erreurs)) { ?>
    <div class="error-message">
        <?php 
            foreach ($erreurs as $erreur) {
                echo "<p>$erreur</p>";
            }  
        ?>
    </div>
    <?php } ?>

    <div>
        <input type='submit' name="Ajouter" value='Ajouter' />
    </div>
</form>
<?php } ?>


