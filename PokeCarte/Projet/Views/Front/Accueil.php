<div id="listeSeries" class="table-responsive">
    <div class="series-section">
        <h2>Les séries japonaises</h2>
        <div class="images-container">
            <?php 
                foreach ($lesSeriesJap as $uneSerie) {
                    ?>
                    <div class="image-item">
                        <a href='./?action=detailSerie&id=<?php echo $uneSerie->__get("id");?>'>
                            <img src="<?php echo $uneSerie->__get("image"); ?>" alt="Image">
                        </a>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
    <div class="series-section">
        <h2>Les séries françaises</h2>
        <div class="images-container">
            <?php 
                foreach ($lesSeriesFr as $uneSerie) {
                    ?>
                    <div class="image-item">
                        <a href='./?action=detailSerie&id=<?php echo $uneSerie->__get("id");?>'>
                            <img src="<?php echo $uneSerie->__get("image"); ?>" alt="Image">
                        </a>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>
