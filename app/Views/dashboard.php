<style>
    .form-control{
	border-radius: 7px;
	border: 1px solid #E3E6ED;
    height:50px;
    }
    input.form-control:focus{
        box-shadow: none;
        border: 1px solid #695CFE
    }
    .btn-primary{
        border: 1px solid #695CFE;
        background-color:#695CFE;
        border-radius: 7px;
        width:50px;
    }
    .btn-primary:hover{
        box-shadow:none;
    }
    .btn-primary:focus{
        box-shadow: none;
        border: 1px solid #695CFE;
    }
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
        <h3>Job Board</h3>
    </div>

    <hr>

    <div class="container mx-auto m-3">

        <!-- search box -->
        <div class="d-flex py-2">
            <div class="input-group mb-3" id="search-form">
                <input type="text" class="form-control" id="search-box" name="query1" placeholder="Search offer...">
                <div class="input-group-append"><button class="btn btn-primary"><i class="bx align-text-bottom bx-search" style="font-size:25px"></i></button></div>
            </div>
        </div>

    </div>

        <!-- search results --> 
    <div class="container mx-auto m-3" id="search-results">
    </div>
   

    <div class="container mx-auto m-3">
        <h5 class="title mb-4"> Lastest opportunities</h5>

        <?php 
    
            $offer_card_template = "<div class='col-md-3 mt-2'>
                <div class='card p-3 mb-5' style='height:12rem'>
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
        
            <?php foreach ($allOffers as $offer) : ?>

            <?php echo sprintf($offer_card_template, $offer['company'], $offer['updated_at'], 
            '', base_url()."dashboard/offer/".$offer['id'], $offer['title']." - ".$offer['city'].", ".$offer['country']); ?>

            <?php endforeach; ?>
            
        </div> 
    </div>


</section>
</div>

<script>
    // use AJAX to retrieve relevant elements 
    $(document).ready(function() {
        $('#search-box').on('input', function() {
            var search = $(this).val();
            if (search!="") {  
                $.ajax({
                    url: "<?php echo base_url().'dashboard/fetch'?>",
                    method: "GET",
                    data: {query:search},
                    success: function(response) {
                        // console.log(response);
                        var html = "";
                        console.log(response);
                        var obj = JSON.parse(response);
                        if (obj.offers != "") {
                            var html = "<h5 class='mb-4'> Your search results</h5>"
                                        +"<div class='row jutify-content-center'>";
                            $.each(obj.offers, function(key,val) {
                                console.log(val.title);
                                html +=  "<div class='col-md-3 mt-2'>"
                                            +"<div class='card p-3 mb-5' style='height:12rem'>"
                                                +"<div class='d-flex justify-content-between'>"
                                                    +"<div class='ms-2 c-details'>"
                                                        +"<h6 class='card-subtitle mb-0 mt-1'>"+val.company+"</h6>"
                                                        +"<span class='card-date'>"+val.updated_at+"</span>"
                                                    +"</div>"
                                                +"</div>"
                                                +"<div> <span class='badge badge-pill badge-warning'></span></div>"
                                                +"<a href='<?php echo base_url().'dashboard/offer/'?>"+val.id +"'" +"class='mt-5'>"
                                                    +"<h5 class='card-title' style='font-size:18px'>" +val.title +" - " +val.city +", "+val.country +"</h5>"
                                                +"</a>"
                                            +"</div>"
                                        +"</div>";
                            });
                            html = html +"</div>";  
                        } else {
                            html = html +"<div class='mx-auto mb-5'><span>No matches found for your search...</span></div> </div>"
                        };
                        $('#search-results').html(html);  
                    }
                });
            } else {
                $('#search-results').empty();
            } 
        });
    });
</script>

</body>







