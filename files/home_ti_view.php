<?php include'db_connection.php' ?>
<?php 
    if ($_SESSION['username']) {
        // keep user on page
        $username = $_SESSION['username'];
    }else{
      ?>
       <script>
          window.location="index.php";
        </script>
      <?php
    }
 ?>
<?php include 'header.php'; ?>

<?php 

if (isset($_GET['del'])) {
    $ti_id = $_GET['del'];

    $q = "SELECT * FROM  `home_ti`";
    $data = mysqli_query($con,$query);
    if (mysqli_num_rows($data) > 3)  {

    $query = "DELETE FROM `home_ti` WHERE ti_id='$ti_id' ";
    $fire = mysqli_query($con,$query);
    
    if ($fire){ $success = "Banner deleted succefully !"; }
    }else{
          $error = "Banner Can not be deleted !";
    }
}


if (isset($_POST['update'])) 
{
    $desc=mysqli_real_escape_string($con,$_POST['desc']);
    $edit_id=$_POST['edit_id'];
    $qry="UPDATE `home_content` SET `h_desc`='$desc' WHERE `h_id`='$edit_id'";
    if (mysqli_query($con,$qry)) 
    {
        ?>
        <script type="text/javascript">
            window.location.href="home_ti_view.php?success";
        </script>
        <?php
        # code...
    }
    else
    {
        ?>
        <script type="text/javascript">
            window.location.href="home_ti_view.php?error";
        </script>
        <?php
    }
}


 ?>

<style type="text/css">th{text-transform: uppercase;}</style>

<div id="page-wrapper">
<div class="container-fluid">
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Homepage Text-Image</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
<li><a href="dashboard.php">Dashboard</a></li>
<li class="active">Text-Image 1</li>
        </ol>
    </div>
</div>

<div class="row">
<div class="col-sm-12">
    <div class="white-box">

                    <?php

    if (isset($success)) 
    {
        ?>
       <div class="alert alert-success"><?php  echo $success  ?></div>
        <?php
        # code...
    }


    ?>
    <?php

    if (isset($error)) 
    {
        ?>
    <div class="alert alert-danger"><?php  echo $error;   ?></div>
        <?php
        # code...
    }


    ?>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
<tr>
    <th>Image</th>
    <th>Title</th>
    <th>Description</th>
    <th>Link / URL</th>    
    <th>Action</th>
</tr>
                </thead>
                <tbody>
 <?php

    $query = "SELECT * FROM `home_ti` WHERE `lang` = '$lang'";
    $fire = mysqli_query($con,$query);

    if (mysqli_num_rows($fire) >= 1) {
        
        while ($ti = mysqli_fetch_assoc($fire)) { ?>
<tr>
    <td><img width="150" src="images/<?php echo $ti['ti_img']; ?>"></td>
    <td><?php echo $ti['ti_title']; ?></td>    
    <td><?php echo $ti['ti_desc']; ?></td>
    <td><?php echo $ti['ti_btn_url'] ?></td>
    <td>
<a href="home_ti_edit.php?edit=<?php echo $ti['ti_id'] ?>" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></a><!-- 
<a href="home_ti_view.php?del=<?php echo $ti['ti_id'] ?>" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash"></i></a> -->
    </td>
</tr>

  <?php }}
  else{
    echo "<tr><td>no database to show</td></tr>";
  } ?>

                </tbody>
            </table>
        </div>
        <h3 align="center">Top Description</h3>

        <?php
        if (isset($_GET['success'])) 
        {
            ?>
            <div class="alert alert-success">Update Success</div>
            <?php
            # code...
        }
        if (isset($_GET['error'])) 
        {
            ?>
            <div class="alert alert-danger">Something Went Wrong</div>
            <?php
            # code...
        }




        ?>  

        <?php
        $data=mysqli_query($con,"SELECT * FROM `home_content` WHERE `lang`='$lang' ");
        $row=mysqli_fetch_assoc($data);


        ?>
        <form method="post">
            <textarea name="desc" class="form-control"><?php echo $row['h_desc']; ?></textarea>
            <input type="hidden" name="edit_id" value="<?php   echo $row['h_id'] ?>">
            <br>
            <button type="submit" name="update" class="btn btn-info">Update</button>
        </form>
    </div>
</div>
                </div>


</div>
<!-- /.container-fluid -->

<?php include 'footer.php'; ?>
