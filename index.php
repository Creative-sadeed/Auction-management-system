<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('admin/db_connect.php');
    ob_start();
        $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
         foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
    include('header.php');

	
    ?>

    <style>
      #main-field{
        margin-top: 5rem!important;
      }
      .container img{
        width: 50px;
        height: 40px;
      }
.nav-bar-home{
  width: 100%;
  height: 100px;
  background-color: transparent;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #fff;

}
.logo{
  float: left;
  width: 170px;
  height: 40px;
  margin-top: 30px;
  margin-left: 120px;
  position: fixed;
  list-style: none;
}
.logo img{
  width: 55px;
  height: 45px;
}
.logo li{
  font-size: 20SSpx;
  padding-top: 5px;
}
.menu{
  float: right;
  display: flex;
  flex-direction: row;
  margin-right: 130px ;
  list-style: none;
  margin-top: 45px;
}
.menu li{
  margin-left: 12px;
}
.menu a{
  color: black;
  font-size: 17px;
  font-weight: 500;
  padding: 10px 15px;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}
.menu a:hover{
  text-decoration:none;
  border: none;
  color:#007bff;
}
    </style>
    <body id="page-top">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
      <div class="nav-bar-home">
        <div class="logo">
            <li><img src="./images/Alogo.png" alt=""> Auction</li>
        </div>
        <div class="menu">
            <li><a href="index.php?page=home">Home</a></li>
            <li><a href="index.php?page=category">Category</a></li>
            <li><a href="index.php?page=about">About</a></li>
            <li><a href="index.php?page=contact">Contact Us</a></li>
            <?php if(isset($_SESSION['login_id'])): ?>
                <li><a href="admin/ajax.php?action=logout2"><?php echo "Welcome ".$_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a></li>
                    <?php else: ?>
                      <li><a href="javascript:void(0)" id="login_now">Login</a></li>
                    <?php endif; ?>
        </div>
    </div>
        
        
  <main id="main-field">
        <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        include $page.'.php';
        ?>
       
</main>
<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>

        
       <?php include('footer.php') ?>
    </body>
    <script type="text/javascript">
      $('#login').click(function(){
        uni_modal("Login",'login.php')
      })
      $('.datetimepicker').datetimepicker({
          format:'Y-m-d H:i',
      })
      $('#find-car').submit(function(e){
        e.preventDefault()
        location.href = 'index.php?page=search&'+$(this).serialize()
      })
    </script>
    <?php $conn->close() ?>

</html>
<div class="footer">
    <div class="lin">
        <hr>
    </div>
    <div class="copywrite">
        <div class="copy-left">
            <h2>© 2023 Auction</h2>
        </div>
        <div class="copy-right">
          <div class="copy-head">
            <h2>Contact Us</h2>
          </div>
          <div class="copy-icons">
          <ul>
              <li><a href="https://www.facebook.com/"><img src="./images/facebook.png" alt=""></a></li>
              <li><a href="https://twitter.com/"><img src="./images/twitter.png" alt=""></a></li>
              <li><a href="https://www.instagram.com/"><img src="./images/insta.png" alt=""></a></li>
            </ul>
          </div>
            
        </div>
    </div>
    </footer>
    </div>