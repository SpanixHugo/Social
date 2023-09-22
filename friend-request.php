<?php
require_once("./includes/Session.php");
require_once("./store/request.php");

$FRIENS_REQUESTS = getRequestById($_SESSION['SOCIAL_LOGGED_USER']);
$PEOPLE_YOU_MAY_KNOW = getPeopleYouMayKnow($_SESSION['SOCIAL_LOGGED_USER']);

?>
<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>SocialV - Responsive Bootstrap 4 Admin Dashboard Template</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="images/favicon.ico" />
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Typography CSS -->
   <link rel="stylesheet" href="css/typography.css">
   <!-- Style CSS -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/responsive.css">
</head>

<body class="sidebar-main-active right-column-fixed">
   <!-- loader Start -->
   <div id="loading">
      <div id="loading-center">
      </div>
   </div>
   <!-- loader END -->
   <!-- Wrapper Start -->
   <div class="wrapper">
      <!-- Sidebar  -->
      <?php include("./includes/Sidebar.php") ?>
      <!-- TOP Nav Bar -->
      <?php include("./includes/Header.php"); ?>
      <!-- TOP Nav Bar END -->
      <!-- Right Sidebar Panel Start-->
      <?php include("./includes/RightSidebar.php") ?>
      <!-- Right Sidebar Panel End-->
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Friend Request</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="request-list list-inline m-0 p-0">
                           <?php if ($FRIENS_REQUESTS) : ?>
                              <?php foreach ($FRIENS_REQUESTS as $req) : ?>
                                 <?php $request = getUserById($req['sender']); ?>
                                 <li class="d-flex align-items-center">
                                    <div class="user-img img-fluid">
                                       <?php if ($request['profile_pic']) : ?>
                                          <img src="profile_pic/<?= $request['profile_pic']; ?>" alt="story-img" class="rounded-circle avatar-40">
                                       <?php else : ?>
                                          <img src="images/user/11.jpg" alt="story-img" class="rounded-circle avatar-40">
                                       <?php endif; ?>
                                    </div>
                                    <div class="media-support-info ml-3">
                                       <h6><?= $request['firstname'] . ' ' . $request['lastname'] ?></h6>
                                       <!-- TODO: <p class="mb-0">40  friends</p> -->
                                    </div>
                                    <div class="d-flex align-items-center">
                                       <form action="./handlers/friend_handler.php" method="post">
                                          <input name="req_id" value="<?= $req['request_id'] ?>" type="hidden" />
                                          <button name="confirm" value="<?= $request['user_id']; ?>" class="mr-3 btn btn-primary rounded">Confirm</button>
                                       </form>
                                       <form action="./handlers/friend_handler.php" method="post">
                                          <button name="delete" value="<?= $req["request_id"]; ?>" class="mr-3 btn btn-danger rounded">Delete Request</button>
                                       </form>

                                    </div>
                                 </li>
                              <?php endforeach; ?>
                           <?php else : ?>
                              <p class="py-3 text-muted">No friends request</p>
                           <?php endif; ?>

                           <?php if (count($FRIENS_REQUESTS) > 10) : ?>
                              <li class="d-block text-center">
                                 <a href="#" class="btn btn-request">View More Request</a>
                              </li>
                           <?php endif; ?>
                        </ul>
                     </div>
                  </div>
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">People You May Know</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="request-list list-inline m-0 p-0">
                           <?php if ($PEOPLE_YOU_MAY_KNOW) : ?>
                              <?php foreach ($PEOPLE_YOU_MAY_KNOW as $request) : ?>
                                 <li class="d-flex align-items-center">
                                    <div class="user-img img-fluid">
                                       <?php if ($request['profile_pic']) : ?>
                                          <img src="profile_pic/<?= $request['profile_pic']; ?>" alt="story-img" class="rounded-circle avatar-40">
                                       <?php else : ?>
                                          <img src="images/user/11.jpg" alt="story-img" class="rounded-circle avatar-40">
                                       <?php endif; ?>
                                    </div>
                                    <div class="media-support-info ml-3">
                                       <h6><?= $request['firstname'] . ' ' . $request['lastname'] ?></h6>
                                       <!-- TODO: <p class="mb-0">40  friends</p> -->
                                    </div>
                                    <div class="d-flex align-items-center">
                                       <form action="./handlers/friend_handler.php" method="post">
                                          <button name="add-friend" value="<?= $request['user_id']; ?>" class="mr-3 btn btn-primary rounded">Add friend</button>
                                       </form>
                                    </div>
                                 </li>
                              <?php endforeach; ?>
                           <?php else : ?>
                              <p class="py-3 text-muted">No person found.</p>
                           <?php endif; ?>

                           <?php if (count($PEOPLE_YOU_MAY_KNOW) > 10) : ?>
                              <li class="d-block text-center">
                                 <a href="#" class="btn btn-request">View More people</a>
                              </li>
                           <?php endif; ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Wrapper END -->
   <!-- Footer -->
   <footer class="bg-white iq-footer">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-6">
               <ul class="list-inline mb-0">
                  <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                  <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
               </ul>
            </div>
            <div class="col-lg-6 text-right">
               Copyright 2020 <a href="#">SocialV</a> All Rights Reserved.
            </div>
         </div>
      </div>
   </footer>
   <!-- Footer END -->
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <!-- Appear JavaScript -->
   <script src="js/jquery.appear.js"></script>
   <!-- Countdown JavaScript -->
   <script src="js/countdown.min.js"></script>
   <!-- Counterup JavaScript -->
   <script src="js/waypoints.min.js"></script>
   <script src="js/jquery.counterup.min.js"></script>
   <!-- Wow JavaScript -->
   <script src="js/wow.min.js"></script>
   <!-- Apexcharts JavaScript -->
   <script src="js/apexcharts.js"></script>
   <!-- Slick JavaScript -->
   <script src="js/slick.min.js"></script>
   <!-- Select2 JavaScript -->
   <script src="js/select2.min.js"></script>
   <!-- Owl Carousel JavaScript -->
   <script src="js/owl.carousel.min.js"></script>
   <!-- Magnific Popup JavaScript -->
   <script src="js/jquery.magnific-popup.min.js"></script>
   <!-- Smooth Scrollbar JavaScript -->
   <script src="js/smooth-scrollbar.js"></script>
   <!-- lottie JavaScript -->
   <script src="js/lottie.js"></script>
   <!-- am core JavaScript -->
   <script src="js/core.js"></script>
   <!-- am charts JavaScript -->
   <script src="js/charts.js"></script>
   <!-- am animated JavaScript -->
   <script src="js/animated.js"></script>
   <!-- am kelly JavaScript -->
   <script src="js/kelly.js"></script>
   <!-- am maps JavaScript -->
   <script src="js/maps.js"></script>
   <!-- am worldLow JavaScript -->
   <script src="js/worldLow.js"></script>
   <!-- Chart Custom JavaScript -->
   <script src="js/chart-custom.js"></script>
   <!-- Custom JavaScript -->
   <script src="js/custom.js"></script>
</body>

</html>