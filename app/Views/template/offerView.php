<style>
    #offer-update-at {
        color: #808080;
    }

    .card-body .icon {
        border-radius:5px;
        color: #363359;
        background-color:#E3E6ED;
        border: 1px solid #E3E6ED;
    }
    .icon-btn i {
        font-size:25px;
       /* color: #808080; */
    } 
    .icon-btn i:hover {
        cursor:pointer;
        transform: translateY(-2px)
    }
    .item .bx-heart {
        color:#808080;
    }
    .item .bx-star{
        color: #808080;
    }
    .item .bxs-heart {
        color:#FF0066;
    }
    .item .bxs-star {
        color:#FFBE6A;
    }

</style>


<section class="main col" style="margin:1%">

    <div class="container my-3">
        
        <?php if ($hasLiked==true) {
                    $heart = 'bxs-heart';
                } else {
                    $heart = 'bx-heart';
                };
        ?>

        <?php if ($isFavourite==true) {
                    $star = 'bxs-star';
                } else {
                    $star = 'bx-star';
                };
        ?>

        <div class="card p-4 mt-4">
            <div class="d-flex justify-content-between mx-4 px-1 mt-2">
                <div class="item"> <h4 class="card-title " id="offer-title"> <?php echo $title ;?></h4> </div>
                <div class="item"> 
                    <span class='icon-btn mx-1'> <i class="bx <?php echo $heart ?> bx-border-circle" id='btn-like'></i> </span>
                    <span class='icon-btn'> <i class="bx <?php echo $star ?> bx-border-circle" id='btn-favourite'></i> </span>
                </div>
            </div>


                <div class="d-flex flex-column mx-4 px-1 mb-3">
                    <span class="mb-1" id="offer-company"><?php echo $company ;?></span>
                    <span class="mb-1" id="offer-location"> <?php echo $city.", ".$state.", ".$country ;?></span>
                    <span class="mt-2 mb-1" id="offer-update-at"> <?php echo $updated_at ;?></span>
                </div>
                <hr class="m-2 px-0">

                <div class="card-body">  
                    <div class="d-flex flex-column mb-3">
                        <h5 class="pb-2"> Job description </h5>
                        <?php echo $description ;?>
                    </div>
                    <div class="d-flex flex-column">
                        <div> 
                            <a href=<?php echo base_url('offer/apply/').$id ;?> class="btn btn-primary">Apply now</a>
                        </div>
                    </div>
                </div>
        </div>

        <div class="card px-4 py-2 mt-4">
            <div class="card-body">  
                <div class="d-flex flex-column">
                            <h5 class="pb-1"> New comment </h5> 
                            <?php echo form_open(base_url().'offer/comment/'.$id) ;?>
                            <!-- Add comment -->
                            <div class="d-flex mt-2">
                                <input class="form-control px-3 py-2 mr-2" name="newComment" id="new-comment" placeholder="Add a comment"></input>
                                <button class="btn btn-primary" type="submit" id="btn-post-comment" >Post</button>
                            </div>
                            <?php echo form_close() ;?>
                </div>
            </div>
        </div>


<script>
    $(document).ready(function() {
        // Handling the like function 
        $('#btn-like').on('click', function() 
        {
            $('#btn-like').toggleClass('bxs-heart bx-heart')
            if ($('#btn-like').hasClass('bx-heart')) 
            {
                $.ajax({
                    url: "<?php echo base_url().'offer/remove_like/'.$id ;?>",
                    method: 'POST',
                    data: {},
                    success: function(response) {
                        console.log(response);
                    } 
                })
            };
            if ($('#btn-like').hasClass('bxs-heart')) 
            {
                $.ajax({
                    url: "<?php echo base_url().'offer/like/'.$id ;?>",
                    method: 'POST',
                    data: {},
                    success: function(response) {
                        console.log(response);
                    } 
                });
            }

        });
        // Handling the favourite function 
        $('#btn-favourite').on('click', function() 
        {
            $('#btn-favourite').toggleClass('bxs-star bx-star');
            if ($('#btn-favourite').hasClass('bx-star')) 
            {
                $.ajax({
                    url: "<?php echo base_url().'offer/remove_favourite/'.$id ;?>",
                    method: 'POST',
                    data: {},
                    success: function(response) {
                        console.log(response);
                    } 
                });
            };
            if ($('#btn-favourite').hasClass('bxs-star')) 
            {
                $.ajax({
                    url: "<?php echo base_url().'offer/add_favourite/'.$id ;?>",
                    method: 'POST',
                    data: {},
                    success: function(response) {
                        console.log(response);
                    } 
                });
            }
        });
    });
</script>
