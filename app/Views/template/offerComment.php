<style>
    .comment-content {
        width:100%;
    }
</style>


<div class="card px-4 py-2 mt-4">
            <div class="card-body">  
                <div class="d-flex flex-column">
                            <h5 class="pb-3"> Comments (<?php echo count($offerAllComments);?>) </h5> 
                
                            <?php 
                                
                                $comment_template = 
                                    "<div class='comment d-flex mt-2'>
                                        <div class='text-center mr-2' id='comment-user-icon' style='font-size:30px'>
                                            <span class='icon mx-1 px-1 pt-1' > <i class='bx bx-user align-self-center pt-2 px-1'></i> </span>
                                        </div>
                                        <div class='comment-content'> 
                                            <div class='d-flex justify-content-between'>
                                                <span class='align-self-center px-2'>Céline Ma</span>
                                                <span class='align-self-center px-2'>%s</span>
                                            </div> 
                                            <p class='comment-text align-self-center p-2'> %s </p>
                                        </div>  
                                    </div>" ;

                                foreach ($offerAllComments as $comment) :
                                    echo sprintf($comment_template, $comment['posted_at'], $comment['content']);
                                endforeach ;
                                
                            ?>
                            
                </div>
            </div>
        </div>



    </div>
</section>
</div>