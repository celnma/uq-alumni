  <section class="main col" style="margin:1%">  

      <div class="container mt-3">
        <h3>Career</h3>
      </div>
          
      <hr>

      <div class="container mx-auto m-3">

        <div class="col">
            <div class="h5">Job search</div>
        </div>
        <hr>

        <div class="col">
            <div class="h5">My applications</div>
            <a href= <?php echo base_url('career/apply_to_offer') ?> class="btn btn-outline-primary">Apply</a>
        </div>
        <hr>
        
        <div class="col">
          <div class="row d-flex justify-content-between px-3">
              <div class="h5">My offers</div>
              <a href= <?php echo base_url('career/add_offer_form') ?> class="btn btn-outline-primary">Add an offer</a>
          </div>

          <div class="row d-flex justify-content-between px-3 mt-3">

            <table class="table table-light table-bordered table-sm table-hover">
              <thead class="thead thead-dark">
                <tr>
                  <th scope="col">#Offer Id</th>
                  <th scope="col">Title</th>
                  <th scope="col">Company</th>
                  <th scope="col">Location</th>
                  <th scope="col">Last update</th>
                </tr>
              </thead>
              <tbody>



                  <?php foreach ($userOffers as $offer) : ?>

                <tr>
                  <th scope="row"><?php echo $offer['id'] ?></th>
                  <td><?php echo $offer['title'] ?></td>
                  <td><?php echo $offer['company'] ?></td>
                  <td><?php echo "{$offer['city']}, {$offer['state']}, {$offer['country']}"?></td>
                  <td><?php echo $offer['updated_at'] ?></td>
                </tr>

                <?php endforeach; ?>

              </tbody>
            </table>

          </div>

        </div>

      </div>
       
  </section>
</div>

</body>