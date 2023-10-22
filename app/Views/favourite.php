<style>
    .card{
        border-radius:0px;
    }
    .card:hover{
        box-shadow:8px 8px 0px -3px #363359;
        border: 1px solid #363359;
        transform: translateY(-5px);
    }
    .card-subtitle {
        font-size:15px;
    }
    .card-date {
        font-size:13px;
    }
</style>



<section class="main col" style="margin:1%">

    <div class="container my-3">
        <h3>Favourites</h3>
    </div>

    <hr>

    <div class="container mx-auto mx-3 mt-5">

        <?php 
    
            $offer_card_template = "<div class='col-md-3 mt-2'>
                <div class='card p-3 mb-4' style='height:12rem'>
                    <div class='d-flex justify-content-between'>
                            <div class='ms-2 c-details'>
                                <h6 class='card-subtitle mb-0 mt-1'>%s</h6> 
                                <span class='card-date'>%s</span>
                            </div>
                
                    </div>
                    <div>
                            <span class='badge badge-pill badge-warning'>%s</span>
                    </div>
                    <a href='%s' class='mt-5'>
                        <h5 class='card-title' style='font-size:18px'>%s</h5>
                    </a>
                </div>
            </div>" ; ?>
    
        <div class="row jutify-content-center">
            <?php 
                if (!empty($allFavourites))  {
                    foreach ($allFavourites as $offer) {
                        echo sprintf($offer_card_template, $offer->company, $offer->updated_at, 
                                    '', base_url()."dashboard/offer/".$offer->id, $offer->title." - ".$offer->city.", ".$offer->country);
                    }
                } else {
                    echo "<span> You don't have any offer saved... </span>";
                }
            ?>
        </div> 
</div>


</section>
</div>
</body>