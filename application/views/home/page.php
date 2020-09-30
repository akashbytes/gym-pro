 <?php 



    foreach ($p_data as $key => $row) 

    {

    }



 ?>

            <div class="main">

                <div class="container">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="">

                                <h1 class="scroll-anim text-center page_title" data-anim="fadeInUp">

                                    <?php  echo $row['p_title'];   ?>

                                </h1>

                                <h2 class="scroll-anim page_heading" data-anim="fadeInUp">

                                    <?php  echo $row['p_heading'];   ?>

                                </h2>



                                <!-- <h2 class="scroll-anim" data-anim="fadeInUp" data-anim-delay="0.2s">PAGE NOT FOUND!</h2> -->

                                <p class="scroll-anim" data-anim="fadeInUp" data-anim-delay="0.4s">



                                    <?php  echo $row['p_desc'];   ?>

                                </p>

                                

                            </div><!-- End .error-page -->

                        </div><!-- End .col-md-9 -->

                    </div><!-- End .row -->

                </div><!-- End .container -->

            </div><!-- End .main -->



             <script src="<?php   echo base_url()  ?>assets/js/plugins.js"></script>

        <script src="<?php   echo base_url()  ?>assets/js/main.js"></script>



<!-- Mirrored from hustlethemes.com/html/Hustle-Furniture/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2019 11:47:20 GMT -->

<style type="text/css">

    .page_title

    {

        font-family: "Oswald", sans-serif;
font-size: 26px;
line-height: 1.38;
font-weight: 400;
color: #193769;
margin: 0 0 3px;
text-transform: uppercase;
letter-spacing: 0.085em;

    }

    .page_heading

    {

        font-size: 23px;

        font-weight: 400;

    }

    .page_content

    {

    text-indent: 200px!important;

    }

</style>