<div class="iq-top-navbar">
  <div class="iq-navbar-custom">
    <nav class="navbar navbar-expand-lg navbar-light p-0">
      <div class="iq-navbar-logo d-flex justify-content-between">
        <a href="./newsfeed">
          <img src="images/logo.png" class="img-fluid" alt="">
          <span>SocialV</span>
        </a>
        <div class="iq-menu-bt align-self-center">
          <div class="wrapper-menu">
            <div class="main-circle"><i class="ri-menu-line"></i></div>
          </div>
        </div>
      </div>
      <div class="iq-search-bar">
        <form action="#" class="searchbox">
          <input type="text" class="text search-input" placeholder="Type here to search...">
          <a class="search-link" href="#"><i class="ri-search-line"></i></a>
        </form>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
        <i class="ri-menu-3-line"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto navbar-list">
          <li>
            <a href="profile" class="iq-waves-effect d-flex align-items-center">
              <?php if($USER['profile_pic']): ?>
                <img src="./profile_pic/<?= $USER['profile_pic'] ?>" class="img-fluid rounded-circle mr-3" alt="user"> 
              <?php else: ?>
                <img src="images/user/11.jpg" class="img-fluid rounded-circle mr-3" alt="user">
              <?php endif; ?>
              
              <div class="caption">
                <h6 class="mb-0 line-height"><?= $USER['firstname'] . " " . $USER['lastname'] ?></h6>
              </div>
            </a>
          </li>
          <li>
            <a href="./newsfeed" class="iq-waves-effect d-flex align-items-center">
              <i class="ri-home-line"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="search-toggle iq-waves-effect" href="./friend-request"><i class="ri-group-line"></i></a>
            <div class="iq-sub-dropdown iq-sub-dropdown-large">
              <div class="iq-card shadow-none m-0">
                <div class="iq-card-body p-0 ">
                  <div class="bg-primary p-3">
                    <h5 class="mb-0 text-white">Friend Request<small class="badge  badge-light float-right pt-1"><?=count($FRIENS_REQUESTS) ?></small></h5>
                  </div>
                  <?php if($FRIENS_REQUESTS): ?>
                    <?php foreach(array_slice($FRIENS_REQUESTS, 0, 5) as $request): ?>
                      <div class="iq-friend-request">
                        <?php $request_details = getUserById($request['sender']) ?> 
                        <div class="iq-sub-card iq-sub-card-big d-flex align-items-center justify-content-between">
                          <div class="d-flex align-items-center">
                            <div class="">
                              <?php if($request_details['profile_pic']): ?>
                                <img class="avatar-40 rounded" src="./profile_pic/<?= $request_details['profile_pic'] ?>" alt="">
                              <?php else: ?>
                                <img class="avatar-40 rounded" src="images/user/01.jpg" alt="">
                              <?php endif; ?>
                            </div>
                            <div class="media-body ml-3">
                              <h6 class="mb-0 "><?= $request_details['firstname'] . " " . $request_details['lastname'] ?></h6>
                              <?php $request_friends = getAllFriends($request['sender']) ?>
                              <p class="mb-0"><?= count($request_friends) ?></p>
                            </div>
                          </div>
                          <div class="d-flex align-items-center">
                            <form action="./handlers/friend_handler.php" method="post">
                              <input name="req_id" value="<?= $request['request_id'] ?>" type="hidden" />
                              <button name="confirm" value="<?= $request_details['user_id']; ?>" class="mr-3 btn btn-primary rounded">Confirm</button>
                            </form>
                            <form action="./handlers/friend_handler.php" method="post">
                              <button name="delete" value="<?= $request["request_id"]; ?>" class="mr-3 btn btn-danger rounded">Delete Request</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                    <?php if(count($FRIENS_REQUESTS) > 5): ?>
                      <div class="text-center">
                        <a href="./friend-request" class="mr-3 btn text-primary">View More Request</a>
                      </div>
                    <?php endif; ?>
                  <?php else: ?>
                      <!-- <div class="text-center">
                        <a href="./friend-request" class="mr-3 btn text-primary">View More Request</a>
                      </div> -->
                      <div class="text-center">
                        <p href="#" class="mr-3 btn text-primary">No Request</p>
                      </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a href="./notification" class="search-toggle iq-waves-effect">
              <div id="lottie-beil"></div>
                <?php if($NOTIFICATIONS): ?>
                  <span class="bg-danger dots"></span>
                <?php else: ?>
                  <span class=""></span>
                <?php endif; ?>
            </a>
            <div class="iq-sub-dropdown">
              <div class="iq-card shadow-none m-0">
                <div class="iq-card-body p-0 ">
                  <div class="bg-primary p-3">
                    <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1"><?=count($NOTIFICATIONS) ?></small></h5>
                  </div>
                  <?php if($NOTIFICATIONS): ?>
                    <?php foreach(array_slice($NOTIFICATIONS, 0, 5) as $Not): ?>
                      <a href="#" class="iq-sub-card">
                        <div class="media align-items-center">
                          <div class="">
                            <?php if($Not['profile_pic']): ?>
                              <img class="avatar-40 rounded" src="./profile_pic/<?= $Not['profile_pic'] ?>" alt="">
                              <?php else: ?>
                                <img class="avatar-40 rounded" src="images/user/11.jpg" alt="">
                            <?php endif; ?>
                          </div>
                          <div class="media-body ml-3">
                            <h6 class="mb-0 "><?= $Not['firstname'] . " " . $Not['lastname'] ?></h6>
                            <small class="float-right font-size-12"><?= $Not['time'] ?></small>
                            <p class="mb-0"><?= $Not['not_message'] ?></p>
                          </div>
                        </div>
                      </a>
                    <?php endforeach; ?>
                    <?php if(count($NOTIFICATIONS) > 5): ?>
                      <div class="text-center">
                        <a href="./notification" class="mr-3 btn text-primary">See More </a>
                      </div>
                    <?php endif; ?>
                  <?php else: ?>
                    <div class="media-body ml-3">
                      <h6 class="mb-0 ">No Notifications</h6>
                    </div>
                  <?php endif; ?>
                  
                </div>
              </div>
            </div>
          </li>
          <!-- <li class="nav-item dropdown">
            <a href="#" class="search-toggle iq-waves-effect">
              <div id="lottie-mail"></div>
              <span class="bg-primary count-mail"></span>
            </a>
            <div class="iq-sub-dropdown">
              <div class="iq-card shadow-none m-0">
                <div class="iq-card-body p-0 ">
                  <div class="bg-primary p-3">
                    <h5 class="mb-0 text-white">All Messages<small class="badge  badge-light float-right pt-1">5</small></h5>
                  </div>
                  <a href="#" class="iq-sub-card">
                    <div class="media align-items-center">
                      <div class="">
                        <img class="avatar-40 rounded" src="images/user/01.jpg" alt="">
                      </div>
                      <div class="media-body ml-3">
                        <h6 class="mb-0 ">Bni Emma Watson</h6>
                        <small class="float-left font-size-12">13 Jun</small>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="iq-sub-card">
                    <div class="media align-items-center">
                      <div class="">
                        <img class="avatar-40 rounded" src="images/user/02.jpg" alt="">
                      </div>
                      <div class="media-body ml-3">
                        <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                        <small class="float-left font-size-12">20 Apr</small>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="iq-sub-card">
                    <div class="media align-items-center">
                      <div class="">
                        <img class="avatar-40 rounded" src="images/user/03.jpg" alt="">
                      </div>
                      <div class="media-body ml-3">
                        <h6 class="mb-0 ">Why do we use it?</h6>
                        <small class="float-left font-size-12">30 Jun</small>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="iq-sub-card">
                    <div class="media align-items-center">
                      <div class="">
                        <img class="avatar-40 rounded" src="images/user/04.jpg" alt="">
                      </div>
                      <div class="media-body ml-3">
                        <h6 class="mb-0 ">Variations Passages</h6>
                        <small class="float-left font-size-12">12 Sep</small>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="iq-sub-card">
                    <div class="media align-items-center">
                      <div class="">
                        <img class="avatar-40 rounded" src="images/user/05.jpg" alt="">
                      </div>
                      <div class="media-body ml-3">
                        <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                        <small class="float-left font-size-12">5 Dec</small>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </li> -->
        </ul>
        <ul class="navbar-list">
          <li>
            <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
              <i class="ri-arrow-down-s-fill"></i>
            </a>
            <div class="iq-sub-dropdown iq-user-dropdown">
              <div class="iq-card shadow-none m-0">
                <div class="iq-card-body p-0 ">
                  <div class="bg-primary p-3 line-height">
                    <h5 class="mb-0 text-white line-height">Hello Bni Cyst</h5>
                    <span class="text-white font-size-12">Available</span>
                  </div>
                  <a href="profile" class="iq-sub-card iq-bg-primary-hover">
                    <div class="media align-items-center">
                      <div class="rounded iq-card-icon iq-bg-primary">
                        <i class="ri-file-user-line"></i>
                      </div>
                      <div class="media-body ml-3">
                        <h6 class="mb-0 ">My Profile</h6>
                        <p class="mb-0 font-size-12">View personal profile details.</p>
                      </div>
                    </div>
                  </a>
                  <a href="profile-edit" class="iq-sub-card iq-bg-warning-hover">
                    <div class="media align-items-center">
                      <div class="rounded iq-card-icon iq-bg-warning">
                        <i class="ri-profile-line"></i>
                      </div>
                      <div class="media-body ml-3">
                        <h6 class="mb-0 ">Edit Profile</h6>
                        <p class="mb-0 font-size-12">Modify your personal details.</p>
                      </div>
                    </div>
                  </a>
                  <a href="account-setting.html" class="iq-sub-card iq-bg-info-hover">
                    <div class="media align-items-center">
                      <div class="rounded iq-card-icon iq-bg-info">
                        <i class="ri-account-box-line"></i>
                      </div>
                      <div class="media-body ml-3">
                        <h6 class="mb-0 ">Account settings</h6>
                        <p class="mb-0 font-size-12">Manage your account parameters.</p>
                      </div>
                    </div>
                  </a>
                  <a href="privacy-setting.html" class="iq-sub-card iq-bg-danger-hover">
                    <div class="media align-items-center">
                      <div class="rounded iq-card-icon iq-bg-danger">
                        <i class="ri-lock-line"></i>
                      </div>
                      <div class="media-body ml-3">
                        <h6 class="mb-0 ">Privacy Settings</h6>
                        <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                      </div>
                    </div>
                  </a>
                  <form action="./handlers/auth_handler.php" method="POST" class="d-inline-block w-100 text-center p-3">
                    <button name="logout" class="bg-primary iq-sign-btn">Sign out<i class="ri-login-box-line ml-2"></i></button>
                  </form>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>