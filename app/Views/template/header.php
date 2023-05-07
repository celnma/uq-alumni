<html>
        <head>
                <title>UQ Alumni</title>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
                <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
                <!--Boxicons for icons-->
                <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
            
            </head>
        <body>
  <script>
        // Show select image using file input.
        function readURL(input) {
            $('#default_img').show();
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#select')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(200);

                };

                reader.readAsDataURL(input. files[0]);
            }
        }
    </script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <header class="row mt-1 px-3">
        <span class="h5" >UQ Alumni</span>
    <header>
</nav>

<div class="container">
