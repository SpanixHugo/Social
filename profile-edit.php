<?php require_once("./includes/Session.php"); ?>
<?php require_once("./utils/common.php"); ?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>SocialV - Profile Edit</title>
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
      <style>
         .profile-full {
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
         }
      </style>
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
         <?php  include("./includes/Sidebar.php"); ?>
         <!-- TOP Nav Bar -->
         <?php  include("./includes/Header.php"); ?>
         <!-- TOP Nav Bar END -->
         <!-- Right Sidebar Panel Start-->
         <?php  include("./includes/RightSidebar.php"); ?>
         <!-- Right Sidebar Panel End-->
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-body p-0">
                           <div class="iq-edit-list">
                              <ul class="iq-edit-profile d-flex nav nav-pills">
                                 <li class="col-md-3 p-0">
                                    <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                    Personal Information
                                    </a>
                                 </li>

                                 <li class="col-md-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                    Change Password
                                    </a>
                                 </li>

                                 <li class="col-md-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#manage-contact">
                                    Manage Contact
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="iq-edit-list-data">
                        <div class="tab-content">
                           <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                              <div class="iq-card">
                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title">Personal Information</h4>
                                    </div>
                                 </div>
                                 <div class="iq-card-body">
                                    <form method="post" enctype="multipart/form-data" action="./handlers/profile_handler.php">
                                       <div class="form-group row align-items-center">
                                          <div class="col-md-12">
                                             <div class="profile-img-edit">
                                                <?php if($USER['profile_pic']): ?>
                                                   <img class="profile-pic profile-full" src="profile_pic/<?= $USER['profile_pic']; ?>" alt="profile-pic">
                                                <?php else: ?>
                                                   <img class="profile-pic profile-full" src="images/user/11.jpg" alt="profile-pic">
                                                <?php endif; ?>
                                                <div class="p-image">
                                                   <i class="ri-pencil-line upload-button"></i>
                                                   <input class="file-upload" name="profile" type="file" accept="image/*"/>
                                                   <input type="hidden" name="prev-pic" value="<?= $USER['profile_pic'] ?? "" ?>" />
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class=" row align-items-center">
                                          <div class="form-group col-sm-6">
                                             <label for="fname">First Name:</label>
                                             <input type="text" class="form-control" id="fname" name="firstname" required value="<?= $USER['firstname'] ?? ""; ?>">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="lname">Last Name:</label>
                                             <input type="text" class="form-control" id="lname" name="lastname" required value="<?= $USER['lastname'] ?? ""; ?>">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="uname">User Name:</label>
                                             <input type="text" class="form-control" id="uname" name="username" required value="<?= $USER['username'] ?? ""; ?>">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="cname">City:</label>
                                             <input type="text" class="form-control" id="cname" name="city" required value="<?= $USER['city'] ?? ""; ?>">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label class="d-block">Gender:</label>
                                             <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio6" name="gender" value="male" class="custom-control-input" <?= ($USER["gender"] && strtolower($USER["gender"]) === "male") ? "checked" : "" ?> >
                                                <label class="custom-control-label" for="customRadio6"> Male </label>
                                             </div>
                                             <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio7" name="gender" value="female" class="custom-control-input"  <?= ($USER["gender"] && strtolower($USER["gender"]) === "female") ? "checked" : "" ?> >
                                                <label class="custom-control-label" for="customRadio7"> Female </label>
                                             </div>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="dob">Date Of Birth:</label>
                                             <input type="date" class="form-control" id="dob" name="dob" value="<?= $USER['dob'] ?? ""; ?>">
                                          </div>

                                          <div class="form-group col-sm-6">
                                             <label>Marital Status:</label>
                                             <select class="form-control" name="marital-status" id="exampleFormControlSelect1">
                                                <option value="">Select your marital status</option>
                                                <?php foreach (["Single", "Married", "Divorced", "Separated"] as $status): ?>
                                                   <option <?= ($USER['marital_status'] && strtolower($USER['marital_status']) === strtolower($status)) ? "selected" : "" ?> value="<?= $status ?>"><?= $status; ?></option>
                                                <?php endforeach; ?>
                                             </select>
                                          </div>

                                          <div class="form-group col-sm-6">
                                             <label>Country:</label>
                                             <select class="form-control" name="country" id="exampleFormControlSelect3">
                                                <option value="">Select your country</option>
                                                <?php foreach($countries as $country): ?>
                                                   <option <?= ($USER['country'] && strtolower($USER['country']) === strtolower($country)) ? " selected" : "" ?>  value="<?= $country; ?>"><?= $country; ?></option>
                                                <?php endforeach; ?>
                                             </select>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label>State:</label>
                                             <input type="text" class="form-control" name="state" placeholder="state" value="<?= $USER['state'] ?? ""; ?>">
                                          </div>
                                          <div class="form-group col-sm-12">
                                             <label>Address:</label>
                                             <textarea class="form-control" name="address" rows="5" style="line-height: 22px;"><?= $USER['address'] ?? ""?></textarea>
                                          </div>
                                       </div>
                                       <button type="submit" name="profile-info" class="btn btn-primary mr-2">Submit</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                              <div class="iq-card">
                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title">Change Password</h4>
                                    </div>
                                 </div>
                                 <div class="iq-card-body">
                                    <form>
                                       <div class="form-group">
                                          <label for="cpass">Current Password:</label>
                                          <a href="javascripe:void();" class="float-right">Forgot Password</a>
                                          <input type="Password" class="form-control" id="cpass" value="">
                                       </div>
                                       <div class="form-group">
                                          <label for="npass">New Password:</label>
                                          <input type="Password" class="form-control" id="npass" value="">
                                       </div>
                                       <div class="form-group">
                                          <label for="vpass">Verify Password:</label>
                                          <input type="Password" class="form-control" id="vpass" value="">
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancle</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                              <div class="iq-card">
                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title">Email and SMS</h4>
                                    </div>
                                 </div>
                                 <div class="iq-card-body">
                                    <form>
                                       <div class="form-group row align-items-center">
                                          <label class="col-md-3" for="emailnotification">Email Notification:</label>
                                          <div class="col-md-9 custom-control custom-switch">
                                             <input type="checkbox" class="custom-control-input" id="emailnotification" checked="">
                                             <label class="custom-control-label" for="emailnotification"></label>
                                          </div>
                                       </div>
                                       <div class="form-group row align-items-center">
                                          <label class="col-md-3" for="smsnotification">SMS Notification:</label>
                                          <div class="col-md-9 custom-control custom-switch">
                                             <input type="checkbox" class="custom-control-input" id="smsnotification" checked="">
                                             <label class="custom-control-label" for="smsnotification"></label>
                                          </div>
                                       </div>
                                       <div class="form-group row align-items-center">
                                          <label class="col-md-3" for="npass">When To Email</label>
                                          <div class="col-md-9">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email01">
                                                <label class="custom-control-label" for="email01">You have new notifications.</label>
                                             </div>
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email02">
                                                <label class="custom-control-label" for="email02">You're sent a direct message</label>
                                             </div>
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email03" checked="">
                                                <label class="custom-control-label" for="email03">Someone adds you as a connection</label>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group row align-items-center">
                                          <label class="col-md-3" for="npass">When To Escalate Emails</label>
                                          <div class="col-md-9">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email04">
                                                <label class="custom-control-label" for="email04"> Upon new order.</label>
                                             </div>
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email05">
                                                <label class="custom-control-label" for="email05"> New membership approval</label>
                                             </div>
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email06" checked="">
                                                <label class="custom-control-label" for="email06"> Member registration</label>
                                             </div>
                                          </div>
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancle</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                              <div class="iq-card">
                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title">Manage Contact</h4>
                                    </div>
                                 </div>
                                 <div class="iq-card-body">
                                    <form>
                                       <div class="form-group">
                                          <label for="cno">Contact Number:</label>
                                          <input type="text" class="form-control" id="cno" value="001 2536 123 458">
                                       </div>
                                       <div class="form-group">
                                          <label for="email">Email:</label>
                                          <input type="text" class="form-control" id="email" value="Bnijone@demo.com">
                                       </div>
                                       <div class="form-group">
                                          <label for="url">Url:</label>
                                          <input type="text" class="form-control" id="url" value="https://getbootstrap.com">
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancle</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
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
      <!-- Chart Custom JavaScript -->
      <script src="js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="js/custom.js"></script>
   </body>
</html>