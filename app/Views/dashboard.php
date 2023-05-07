<div class="container">
            <div class="h3">Dashboard</div> 
            <hr>

        <div class="row mx-auto jutify-content-center">

       
            <?php foreach ($allOffers as $offer) : ?>
<div class="col-sm-4 p-3">

    <div class="card" style="width: 300px; height:200px;">
        <div class="card-body">
            <h5 class="card-title"> <?php echo $offer['title'] ?>  </h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $offer['company'] ?> </h6>
            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>
    
    
</div>
                <?php endforeach; ?>
            </div>

</div>

