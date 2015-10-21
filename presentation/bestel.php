        <div class="wrapper clearfix">
            <div class="txtC">
                <h1>Wat had u <?php if (isset($_GET['aantal'])) { print("nog "); } ?>gewenst?</h1>
            </div>
            <div class="wrapper clearfix txtC">
                <?php
                foreach ($arrCategories as $categorie) {
                    print ("<h2>".$categorie."</h2>");
                    foreach ($arrProducten as $product) {
                        if ($product->categorie ==  $categorie) {
                            print ("<li><a href='index.php?page=bestelling&product=".$product->id."'>".$product->product." <strong>&euro; ".$product->prijs."</strong></a></li>");
                        }
                    }
                }
                ?>
            </div>
        </div>
