<?php require_once("./includes/Session.php"); ?>
<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>SocialV - Chat</title>
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
      <?php include("./includes/Sidebar.php"); ?>
      <!-- TOP Nav Bar -->
      <?php include("./includes/Header.php"); ?>
      <!-- TOP Nav Bar END -->
      <!-- Right Sidebar Panel Start-->
      <?php include("./includes/RightSidebar.php"); ?>
      <!-- Right Sidebar Panel End-->
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-body chat-page p-0">
                        <div class="chat-data-block">
                           <div class="row">
                              <div class="col-lg-3 chat-data-left scroller">
                                 <div class="chat-search pt-3 pl-3">
                                    <div class="d-flex align-items-center">
                                       <div class="chat-profile mr-3">
                                          <img src="images/user/1.jpg" alt="chat-user" class="avatar-60 ">
                                       </div>
                                       <div class="chat-caption">
                                          <h5 class="mb-0">Bni Jordan</h5>
                                          <p class="m-0">Web Designer</p>
                                       </div>
                                       <button type="submit" class="close-btn-res p-3"><i class="ri-close-fill"></i></button>
                                    </div>
                                    <div id="user-detail-popup" class="scroller">
                                       <div class="user-profile">
                                          <button type="submit" class="close-popup p-3"><i class="ri-close-fill"></i></button>
                                          <div class="user text-center mb-4">
                                             <a class="avatar m-0">
                                                <img src="images/user/1.jpg" alt="avatar">
                                             </a>
                                             <div class="user-name mt-4">
                                                <h4>Bni Jordan</h4>
                                             </div>
                                             <div class="user-desc">
                                                <p>Web Designer</p>
                                             </div>
                                          </div>
                                          <hr>
                                          <div class="user-detail text-left mt-4 pl-4 pr-4">
                                             <h5 class="mt-4 mb-4">About</h5>
                                             <p>It is long established fact that a reader will be distracted bt the reddable.</p>
                                             <h5 class="mt-3 mb-3">Status</h5>
                                             <ul class="user-status p-0">
                                                <li class="mb-1"><i class="ri-checkbox-blank-circle-fill text-success pr-1"></i><span>Online</span></li>
                                                <li class="mb-1"><i class="ri-checkbox-blank-circle-fill text-warning pr-1"></i><span>Away</span></li>
                                                <li class="mb-1"><i class="ri-checkbox-blank-circle-fill text-danger pr-1"></i><span>Do Not Disturb</span></li>
                                                <li class="mb-1"><i class="ri-checkbox-blank-circle-fill text-light pr-1"></i><span>Offline</span></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="chat-searchbar mt-4">
                                       <div class="form-group chat-search-data m-0">
                                          <input type="text" class="form-control round" id="chat-search" placeholder="Search">
                                          <i class="ri-search-line"></i>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="chat-sidebar-channel scroller mt-4 pl-3">
                                    <h5 class="">Friends</h5>
                                    <ul class="iq-chat-ui nav flex-column nav-pills">
                                       <?php if (isset($_GET['user'])) : ?>
                                          <?php $activeChat = getUserById($_GET['user']); ?>
                                          <li>
                                             <a data-toggle="pill" href="#chatbox1">
                                                <div class="d-flex align-items-center">
                                                   <div class="avatar mr-2">
                                                      <?php if ($activeChat['profile_pic']) : ?>
                                                         <img src="profile_pic/<?= $activeChat['profile_pic']; ?>" alt="chatuserimage" class="avatar-50 ">
                                                      <?php else : ?>
                                                         <img src="images/user/11.jpg" alt="chatuserimage" class="avatar-50 ">
                                                      <?php endif; ?>
                                                      <span class="avatar-status"><i class="ri-checkbox-blank-circle-fill text-success"></i></span>
                                                   </div>
                                                   <div class="chat-sidebar-name">
                                                      <h6 class="mb-0"><?= $activeChat['firstname'] . " " . $activeChat['lastname'] ?></h6>
                                                      <?php
                                                      $lastChat = getLastConversation($_SESSION['SOCIAL_LOGGED_USER'], $activeChat['user_id']);
                                                      if ($lastChat) :
                                                      ?>
                                                         <span><?= substr($lastChat['message'], 0, 20) . "..." ?></span>
                                                      <?php else : ?>
                                                         <span><?= substr(EMPTY_CHAT_TEXT, 0, 20) . "..." ?></span>
                                                      <?php endif; ?>
                                                   </div>
                                                   <div class="chat-meta float-right text-center mt-2 mr-1">
                                                      <?php $messageCount = getUserUnreadMessageCount($_SESSION['SOCIAL_LOGGED_USER'], $activeChat['user_id']); ?>
                                                      <?php if ($messageCount) : ?>
                                                         <div class="chat-msg-counter bg-primary text-white">
                                                            <?= $messageCount; ?>
                                                         </div>
                                                      <?php endif; ?>
                                                      <?php if ($lastChat) : ?>
                                                         <span class="text-nowrap"><?= date("h:i a", strtotime($lastChat['date'])); ?></span>
                                                      <?php endif; ?>
                                                   </div>
                                                </div>
                                             </a>
                                          </li>
                                       <?php endif; ?>
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-lg-9 chat-data p-0 chat-data-right">
                                 <div class="tab-content">
                                    <?php if (isset($_GET['user'])) : ?>
                                       <?php $user = getUserById($_GET['user']); ?>

                                       <div class="tab-pane fade active show">
                                          <div class="chat-head">
                                             <header class="d-flex justify-content-between align-items-center bg-white pt-3 pr-3 pb-3">
                                                <div class="d-flex align-items-center">
                                                   <div class="sidebar-toggle">
                                                      <i class="ri-menu-3-line"></i>
                                                   </div>
                                                   <div class="avatar chat-user-profile m-0 mr-3">
                                                      <?php if ($user['profile_pic']) : ?>
                                                         <img src="./profile_pic/<?= $user['profile_pic'] ?>" alt="avatar" class="avatar-50 ">
                                                      <?php else : ?>
                                                         <img src="images/user/11.jpg" alt="avatar" class="avatar-50 ">
                                                      <?php endif; ?>
                                                      <span class="avatar-status"><i class="ri-checkbox-blank-circle-fill text-success"></i></span>
                                                   </div>
                                                   <h5 class="mb-0"><?= $user['firstname'] . " " . $user['lastname'] ?></h5>
                                                </div>
                                                <div class="chat-user-detail-popup scroller">
                                                   <div class="user-profile text-center">
                                                      <button type="submit" class="close-popup p-3"><i class="ri-close-fill"></i></button>
                                                      <div class="user mb-4">
                                                         <a class="avatar m-0">
                                                            <img src="images/user/05.jpg" alt="avatar">
                                                         </a>
                                                         <div class="user-name mt-4">
                                                            <h4>Bni Jordan</h4>
                                                         </div>
                                                         <div class="user-desc">
                                                            <p>Cape Town, RSA</p>
                                                         </div>
                                                      </div>
                                                      <hr>
                                                      <div class="chatuser-detail text-left mt-4">
                                                         <div class="row">
                                                            <div class="col-6 col-md-6 title">Bni Name:</div>
                                                            <div class="col-6 col-md-6 text-right">Bni</div>
                                                         </div>
                                                         <hr>
                                                         <div class="row">
                                                            <div class="col-6 col-md-6 title">Tel:</div>
                                                            <div class="col-6 col-md-6 text-right">072 143 9920</div>
                                                         </div>
                                                         <hr>
                                                         <div class="row">
                                                            <div class="col-6 col-md-6 title">Date Of Birth:</div>
                                                            <div class="col-6 col-md-6 text-right">July 12, 1989</div>
                                                         </div>
                                                         <hr>
                                                         <div class="row">
                                                            <div class="col-6 col-md-6 title">Gender:</div>
                                                            <div class="col-6 col-md-6 text-right">Male</div>
                                                         </div>
                                                         <hr>
                                                         <div class="row">
                                                            <div class="col-6 col-md-6 title">Language:</div>
                                                            <div class="col-6 col-md-6 text-right">Engliah</div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="chat-header-icons d-flex">
                                                   <span class="dropdown iq-bg-primary">
                                                      <i class="ri-more-2-line cursor-pointer dropdown-toggle nav-hide-arrow cursor-pointer pr-0" id="dropdownMenuButton02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></i>
                                                      <span class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton02">
                                                         <a class="dropdown-item" href="JavaScript:void(0);"><i class="fa fa-thumb-tack" aria-hidden="true"></i> Pin to top</a>
                                                         <a class="dropdown-item" href="JavaScript:void(0);"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete chat</a>
                                                         <a class="dropdown-item" href="JavaScript:void(0);"><i class="fa fa-ban" aria-hidden="true"></i> Block</a>
                                                      </span>
                                                   </span>
                                                </div>
                                             </header>
                                          </div>
                                          <div class="chat-content scroller">
                                             <?php $chats = getConversation($_SESSION['SOCIAL_LOGGED_USER'], $_GET['user']); ?>

                                             <?php if (count($chats)) :  ?>
                                                <?php foreach ($chats as $chat) : ?>
                                                   <div class="chat <?= $chat['sender_id'] !== $_SESSION['SOCIAL_LOGGED_USER'] ? "chat-left" : ""; ?>">
                                                      <div class="chat-user">
                                                         <a class="avatar m-0">
                                                            <?php $otherUser = getUserById($_GET['user']); ?>
                                                            <?php if(($chat['sender_id'] == $_SESSION['SOCIAL_LOGGED_USER']) && $USER['profile_pic']):?>
                                                               <img src="profile_pic/<?= $USER['profile_pic'] ?>" alt="avatar" class="avatar-35 ">

                                                            <?php elseif (($chat['receiver_id'] == $_SESSION['SOCIAL_LOGGED_USER']) && $USER['profile_pic']): ?>
                                                               <img src="profile_pic/<?= $USER['profile_pic'] ?>" alt="avatar" class="avatar-35 ">

                                                            <?php elseif (($chat['sender_id'] == $_GET['user']) && $otherUser['profile_pic']): ?>
                                                               <img src="profile_pic/<?= $otherUser['profile_pic'] ?>" alt="avatar" class="avatar-35 ">

                                                            <?php elseif (($chat['receiver_id'] == $_GET['user']) && $otherUser['profile_pic']): ?>
                                                               <img src="profile_pic/<?= $otherUser['profile_pic'] ?>" alt="avatar" class="avatar-35 ">

                                                            <?php else: ?>
                                                               <img src="images/user/11.jpg" alt="avatar" class="avatar-35 ">

                                                            <?php endif; ?>
                                                         </a>
                                                         <span class="chat-time mt-1"><?= date("h:i a, M", strtotime($chat['date'])); ?></span>
                                                      </div>
                                                      <div class="chat-detail">
                                                         <div class="chat-message">
                                                            <?php $lines = explode("\n", $chat['message']);?>
                                                            <?php foreach($lines as $line): ?>
                                                               <p><?= $line; ?></p>
                                                            <?php endforeach; ?>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <?php endforeach; ?>
                                             <?php else : ?>
                                                <p class="text-center py-4 text-muted"><?= EMPTY_CHAT_TEXT ?></p>
                                             <?php endif; ?>
                                          </div>
                                          <div class="chat-footer p-3 bg-white">
                                             <form class="d-flex align-items-center" method="post" action="./handlers/chat_handler.php">
                                                <!-- <div class="chat-attagement d-flex">
                                                   <a href="javascript:void();"><i class="fa fa-smile-o pr-3" aria-hidden="true"></i></a>
                                                   <a href="javascript:void();"><i  class="fa fa-paperclip pr-3" aria-hidden="true"></i></a>
                                                </div> -->
                                                <input type="hidden" name="sender" value="<?= $USER['user_id'] ?>">
                                                <input type="hidden" name="receiver" value="<?= $_GET['user'] ?>">
                                                <textarea name="message" rows="1" type="text" class="form-control mr-3" placeholder="Type your message"></textarea>
                                                <button name="send" type="submit" class="btn btn-primary d-flex align-items-center p-2"><i class="fa fa-paper-plane-o" aria-hidden="true"></i><span class="d-none d-lg-block ml-1">Send</span></button>
                                             </form>
                                          </div>
                                       </div>
                                    <?php else : ?>
                                       <div class="tab-pane fade active show" id="default-block" role="tabpanel">
                                          <div class="chat-start">
                                             <span class="iq-start-icon text-primary"><i class="ri-message-3-line"></i></span>
                                             <p class="text-muted mt-3">Click on a chat to see messages.</p>
                                             <p class="text-muted">Select a friend in the right bar to start a new conversation.</p>
                                          </div>
                                       </div>
                                    <?php endif; ?>
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