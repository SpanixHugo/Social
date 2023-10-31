<?php
require_once("./includes/Session.php");
$USERS_POSTS = getPostsByUser($_SESSION['SOCIAL_LOGGED_USER']);
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
   <style>
      .profile-img {
         width: 100px;
         height: 100px;
         object-fit: cover;
      }

      .user-detail {
         display: flex;
         flex-flow: column nowrap;
         justify-content: center;
         align-items: center;
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
                     <div class="iq-card-body profile-page p-0">
                        <div class="profile-header">
                           <div class="cover-container">
                              <img src="images/page-img/profile-bg1.jpg" alt="profile-bg" class="rounded img-fluid">
                              <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                 <li><a href="javascript:void();"><i class="ri-pencil-line"></i></a></li>
                                 <li><a href="javascript:void();"><i class="ri-settings-4-line"></i></a></li>
                              </ul>
                           </div>
                           <div class="user-detail text-center mb-3">
                              <div class="profile-img">
                                 <?php if ($USER['profile_pic']) : ?>
                                    <img src="./profile_pic/<?= $USER['profile_pic'] ?>" class="img-fluid rounded-circle mr-3" alt="user">
                                 <?php else : ?>
                                    <img src="images/user/11.png" alt="profile-img" class="avatar-130 img-fluid" />
                                 <?php endif; ?>
                                 <!-- <img src="images/user/11.jpg" class="img-fluid rounded-circle mr-3" alt="user"> -->
                              </div>
                              <div class="profile-detail">
                                 <h3 class=""><?= $USER['firstname'] . " " . $USER['lastname'] ?></h3>
                              </div>
                           </div>
                           <div class="profile-info p-4 d-flex align-items-center justify-content-between position-relative">
                              <div class="social-links">
                                 <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">

                                 </ul>
                              </div>
                              <div class="social-info">
                                 <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                                    <li class="text-center pl-3">
                                       <h6>Posts</h6>
                                       <p class="mb-0"><?= count($USERS_POSTS) ?></p>
                                    </li>
                                    <li class="text-center pl-3">
                                       <h6>Followers</h6>
                                       <p class="mb-0">206</p>
                                    </li>
                                    <li class="text-center pl-3">
                                       <h6>Following</h6>
                                       <p class="mb-0">100</p>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="iq-card">
                     <div class="iq-card-body p-0">
                        <div class="user-tabing">
                           <ul class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0">
                              <li class="col-sm-3 p-0">
                                 <a class="nav-link active" data-toggle="pill" href="#timeline">Timeline</a>
                              </li>
                              <li class="col-sm-3 p-0">
                                 <a class="nav-link" data-toggle="pill" href="#about">About</a>
                              </li>
                              <li class="col-sm-3 p-0">
                                 <a class="nav-link" data-toggle="pill" href="#friends">friends</a>
                              </li>
                              <li class="col-sm-3 p-0">
                                 <a class="nav-link" data-toggle="pill" href="#photos">Photos</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="tab-content">
                     <div class="tab-pane fade active show" id="timeline" role="tabpanel">
                        <div class="iq-card-body p-0">
                           <div class="row">
                              <div class="col-lg-4">
                                 <div class="iq-card">

                                 </div>


                              </div>
                              <div class="col-lg-12">

                                 <?php if ($POSTS) : ?>
                                    <?php foreach ($POSTS as $post) : ?>
                                       <div class="iq-card">
                                          <div class="iq-card-body">
                                             <div class="post-item">
                                                <div class="user-post-data p-3">
                                                   <div class="d-flex flex-wrap">
                                                      <div class="media-support-user-img mr-3">
                                                         <?php if ($post["profile_pic"]) : ?>
                                                            <img class="rounded-circle img-fluid" src="profile_pic/<?= $post["profile_pic"]; ?>" alt="<?= $post['firstname'] ?>">
                                                         <?php else : ?>
                                                            <img class="rounded-circle img-fluid" src="images/user/11.jpg" alt="">
                                                         <?php endif; ?>
                                                      </div>
                                                      <div class="media-support-info mt-2">
                                                         <h5 class="mb-0 d-inline-block">
                                                            <a href="?user_id=<?= $post['user_id'] ?>" class="">
                                                               <?php if ($post['username']) : ?>
                                                                  <?= $post['username'] ?>
                                                               <?php else :  ?>
                                                                  <?= $post['firstname'] . " " . $post['lastname']; ?>
                                                               <?php endif; ?>
                                                            </a>
                                                         </h5>
                                                         <p class="ml-1 mb-0 d-inline-block">Added New Post</p>
                                                         <p class="mb-0"><?= date("D, M Y h:i:s", strtotime($post['date'])); ?></p>
                                                      </div>
                                                      <div class="iq-card-post-toolbar">
                                                         <div class="dropdown">
                                                            <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                               <i class="ri-more-fill"></i>
                                                            </span>
                                                            <div class="dropdown-menu m-0 p-0">
                                                               <a class="dropdown-item p-3" href="#">
                                                                  <div class="d-flex align-items-top">
                                                                     <div class="icon font-size-20"><i class="ri-save-line"></i></div>
                                                                     <div class="data ml-2">
                                                                        <h6>Save Post</h6>
                                                                        <p class="mb-0">Add this to your saved items</p>
                                                                     </div>
                                                                  </div>
                                                               </a>
                                                               <a class="dropdown-item p-3" href="#">
                                                                  <div class="d-flex align-items-top">
                                                                     <div class="icon font-size-20"><i class="ri-pencil-line"></i></div>
                                                                     <div class="data ml-2">
                                                                        <h6>Edit Post</h6>
                                                                        <p class="mb-0">Update your post and saved items</p>
                                                                     </div>
                                                                  </div>
                                                               </a>
                                                               <a class="dropdown-item p-3" href="#">
                                                                  <div class="d-flex align-items-top">
                                                                     <div class="icon font-size-20"><i class="ri-close-circle-line"></i></div>
                                                                     <div class="data ml-2">
                                                                        <h6>Hide From Timeline</h6>
                                                                        <p class="mb-0">See fewer posts like this.</p>
                                                                     </div>
                                                                  </div>
                                                               </a>
                                                               <a class="dropdown-item p-3" href="#">
                                                                  <div class="d-flex align-items-top">
                                                                     <div class="icon font-size-20"><i class="ri-delete-bin-7-line"></i></div>
                                                                     <div class="data ml-2">
                                                                        <h6>Delete</h6>
                                                                        <p class="mb-0">Remove thids Post on Timeline</p>
                                                                     </div>
                                                                  </div>
                                                               </a>
                                                               <a class="dropdown-item p-3" href="#">
                                                                  <div class="d-flex align-items-top">
                                                                     <div class="icon font-size-20"><i class="ri-notification-line"></i></div>
                                                                     <div class="data ml-2">
                                                                        <h6>Notifications</h6>
                                                                        <p class="mb-0">Turn on notifications for this post</p>
                                                                     </div>
                                                                  </div>
                                                               </a>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="mt-3">
                                                   <p><?= $post['content'] ?></p>
                                                </div>
                                                <div class="user-post">
                                                   <?php if ($post['media']) : ?>
                                                      <?php
                                                      $MEDIA_CONTENTS = json_decode($post['media'], true);
                                                      ?>
                                                      <div class="user-post">
                                                         <div class="d-flex">
                                                            <div class="col-md-12 row m-0 p-0">
                                                               <?php foreach ($MEDIA_CONTENTS as $media) : ?>
                                                                  <div class="col-sm-6 mt-3">
                                                                     <a href="javascript:void();">
                                                                        <?php if ($media['type'] === "image") : ?>
                                                                           <img src="./post_uploads/<?= $media['file'] ?>" alt="post-image" class="img-fluid rounded w-100">
                                                                        <?php else : ?>
                                                                           <video src="./post_uploads/<?= $media['file'] ?>"></video>
                                                                        <?php endif; ?>
                                                                     </a>
                                                                  </div>
                                                               <?php endforeach; ?>
                                                            </div>
                                                         </div>
                                                      </div>


                                                   <?php endif; ?>
                                                </div>
                                                <div class="comment-area mt-3">
                                                   <div class="d-flex justify-content-between align-items-center">
                                                      <div class="like-block position-relative d-flex align-items-center">
                                                         <div class="d-flex align-items-center">
                                                            <form action="./handlers/post_handler.php" method="post" class="like-data"> 
                                                               <div class="dropdown">
                                                                  <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                     <!-- <img src="images/icon/01.png" class="img-fluid" alt=""> -->
                                                                     <?php $userLike = getUserPostLike($post["post_id"], $_SESSION['SOCIAL_LOGGED_USER']); ?>
                                                                     <button name="<?= $userLike ? 'unlike' : 'like' ?>" value="<?= $post['post_id'] ?>" class="dropdown-toggle" style="border: none; background-color: transparent;">
                                                                        <img src="images/icon/01.png" style="filter: <?= $userLike ? "none" : "grayscale(.7)"; ?>;" class="img-fluid" alt="">
                                                                     </button>
                                                                  </span>

                                                               </div>
                                                                        </form>
                                                            <div class="total-like-block ml-2 mr-3">
                                                               <div class="dropdown">
                                                                  <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                     <?php $postLikes = getPostLikes($post["post_id"]); ?>
                                                                     <?= count($postLikes); ?> Likes
                                                                  </span>
                                                                  <?php if (count($postLikes)) : ?>
                                                                     <div class="dropdown-menu">
                                                                        <?php foreach (array_slice($postLikes, 0, 5) as $reactors) : ?>
                                                                           <a class="dropdown-item" href="?user_id=<?= $reactors['user_id']; ?>"><?= $reactors['firstname'] . " " . $reactors['lastname']; ?></a>
                                                                        <?php endforeach; ?>

                                                                        <?php if (count($postLikes) > 5) : ?>
                                                                           <a class="dropdown-item" href="#">Other</a>
                                                                        <?php endif; ?>
                                                                     </div>
                                                                  <?php endif; ?>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="total-comment-block">
                                                            <div class="dropdown">
                                                               <?php $postComments = getPostComments($post['post_id']); ?>
                                                               <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                                                  <?= count($postComments); ?> <?= count($postComments) >= 2 ? "comments" : "comment";  ?>
                                                               </span>
                                                               <?php if (count($postComments)) : ?>
                                                                  <div class="dropdown-menu">
                                                                     <?php foreach (array_slice($postComments, 0, 5) as $comment_user) : ?>
                                                                        <a class="dropdown-item" href="?user_id=<?= $comment_user['user_id']; ?>"><?= $comment_user['firstname'] . " " . $comment_user['lastname']; ?></a>
                                                                     <?php endforeach; ?>

                                                                     <?php if (count($postComments) > 5) : ?>
                                                                        <a class="dropdown-item" href="#">Other</a>
                                                                     <?php endif; ?>
                                                                  </div>
                                                               <?php endif; ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <!-- <div class="share-block d-flex align-items-center feather-icon mr-3">
                                                         <a href="javascript:void();"><i class="ri-share-line"></i>
                                                         <span class="ml-1">99 Share</span></a>
                                                      </div> -->
                                                   </div>
                                                   <hr>
                                                   <ul class="post-comments p-0 m-0">
                                                      <?php if (count($postComments)) : ?>
                                                         <?php foreach ($postComments as $comment) : ?>
                                                            <li class="mb-2" id="<?= $comment['comment_id']; ?>">
                                                               <div class="d-flex">
                                                                  <div class="user-img">
                                                                     <?php if ($comment['profile_pic']) : ?>
                                                                        <img src="./profile_pic/<?= $comment['profile_pic']; ?>" alt="userimg" class="avatar-35 rounded-circle img-fluid">
                                                                     <?php else : ?>
                                                                        <img src="images/user/11.jpg" alt="userimg" class="avatar-35 rounded-circle img-fluid">
                                                                     <?php endif; ?>
                                                                  </div>
                                                                  <div class="comment-data-block ml-3 w-100">
                                                                     <div class="d-flex justify-content-between">
                                                                        <h6><?= $comment['firstname'] . " " . $comment['lastname']; ?></h6>

                                                                        <div class="iq-card-header-toolbar d-flex align-items-center">
                                                                           <div class="dropdown">
                                                                              <span class="dropdown-toggle" id="dropdownMenuButton01" data-toggle="dropdown" aria-expanded="false" role="button">
                                                                                 <i class="ri-more-fill"></i>
                                                                              </span>
                                                                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01" style="">
                                                                                 <form action="./handlers/comment_handler.php" method="post">
                                                                                    <button class="dropdown-item text-danger" name="delete" value="<?= $comment['comment_id']; ?>"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</button>
                                                                                 </form>

                                                                                 <a class="dropdown-item text-primary" href="./newsfeed?edit_comment=<?= $comment['comment_id']; ?>#<?= $comment['comment_id']; ?>"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>

                                                                     <?php if (isset($_GET['edit_comment']) && $_GET['edit_comment'] === $comment['comment_id']) : ?>
                                                                        <!-- EDIT INPUT -->
                                                                        <form method="post" class="comment-text d-flex align-items-center mt-3" action="./handlers/comment_handler.php">
                                                                           <input type="text" class="form-control rounded" value="<?= $comment['message']; ?>" required name="message">
                                                                           <div class="comment-attagement d-flex">
                                                                              <button class="btn btn-primary mr-2" name="update" value="<?= $comment['comment_id']; ?>">
                                                                                 Update
                                                                              </button>
                                                                           </div>
                                                                        </form>
                                                                     <?php else : ?>
                                                                        <p class="mb-0"><?= $comment['message']; ?></p>
                                                                     <?php endif; ?>

                                                                     <div class="d-flex flex-wrap align-items-center comment-activity">
                                                                        <a href="javascript:void();">like</a>
                                                                        <span> <?= date("D, M Y", strtotime($comment['date'])); ?> </span>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </li>
                                                         <?php endforeach; ?>
                                                      <?php else :  ?>
                                                         <li>
                                                            <p class="p-2 text-light">No comment</p>
                                                         </li>
                                                      <?php endif; ?>

                                                   </ul>
                                                   <form method="post" class="comment-text d-flex align-items-center mt-3" action="./handlers/post_handler.php">
                                                      <input type="text" class="form-control rounded" placeholder="Write your comment..." required name="message">
                                                      <div class="comment-attagement d-flex">
                                                         <button class="btn btn-primary mr-2" name="comment" value="<?= $post['post_id']; ?>">
                                                            send
                                                         </button>
                                                      </div>
                                                   </form>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    <?php endforeach; ?>
                                 <?php else : ?>
                                    <div>
                                       <h4>No Post Available</h4>
                                    </div>
                                 <?php endif; ?>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="about" role="tabpanel">
                        <div class="iq-card">
                           <div class="iq-card-body">
                              <div class="row">
                                 <div class="col-md-3">
                                    <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0">
                                       <li>
                                          <a class="nav-link active" data-toggle="pill" href="#basicinfo">Contact and Basic Info</a>
                                       </li>
                                       <li>
                                          <a class="nav-link" data-toggle="pill" href="#family">Family and Relationship</a>
                                       </li>
                                       <li>
                                          <a class="nav-link" data-toggle="pill" href="#work">Work and Education</a>
                                       </li>
                                       <li>
                                          <a class="nav-link" data-toggle="pill" href="#lived">Places You've Lived</a>
                                       </li>
                                       <li>
                                          <a class="nav-link" data-toggle="pill" href="#details">Details About You</a>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="col-md-9 pl-4">
                                    <div class="tab-content">
                                       <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                                          <h4>Contact Information</h4>
                                          <hr>
                                          <div class="row">
                                             <div class="col-3">
                                                <h6>Email</h6>
                                             </div>
                                             <div class="col-9">
                                                <p class="mb-0"><?= $USER['email'] ?></p>
                                             </div>
                                             <div class="col-3">
                                                <h6>Mobile</h6>
                                             </div>
                                             <div class="col-9">
                                                <p class="mb-0"><?= $USER['phone'] ?? 'None' ?></p>
                                             </div>
                                             <div class="col-3">
                                                <h6>Address</h6>
                                             </div>
                                             <div class="col-9">
                                                <p class="mb-0"><?= $USER['address'] ?? "None" ?></p>
                                             </div>
                                          </div>

                                          <h4 class="mt-3">Basic Information</h4>
                                          <hr>
                                          <div class="row">

                                             <div class="col-3">
                                                <h6>Date Of Birth:</h6>
                                             </div>
                                             <div class="col-9">
                                                <p class="mb-0"><?= $USER['dob'] ?></p>
                                             </div>
                                             <div class="col-3">
                                                <h6>Gender</h6>
                                             </div>
                                             <div class="col-9">
                                                <p class="mb-0"><?= $USER['gender'] ?></p>
                                             </div>

                                          </div>
                                       </div>
                                       <div class="tab-pane fade" id="family" role="tabpanel">
                                          <h4 class="mb-3">Relationship</h4>
                                          <ul class="suggestions-lists m-0 p-0">
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>Add Your Relationship Status</h6>
                                                </div>
                                             </li>
                                          </ul>
                                          <h4 class="mt-3 mb-3">Family Members</h4>
                                          <ul class="suggestions-lists m-0 p-0">
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>Add Family Members</h6>
                                                </div>
                                             </li>
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><img src="images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>Paul Molive</h6>
                                                   <p class="mb-0">Brothe</p>
                                                </div>
                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                             </li>
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><img src="images/user/02.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>Anna Mull</h6>
                                                   <p class="mb-0">Sister</p>
                                                </div>
                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                             </li>
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><img src="images/user/03.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>Paige Turner</h6>
                                                   <p class="mb-0">Cousin</p>
                                                </div>
                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="tab-pane fade" id="work" role="tabpanel">
                                          <h4 class="mb-3">Work</h4>
                                          <ul class="suggestions-lists m-0 p-0">
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>Add Work Place</h6>
                                                </div>
                                             </li>
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><img src="images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>Themeforest</h6>
                                                   <p class="mb-0">Web Designer</p>
                                                </div>
                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                             </li>
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><img src="images/user/02.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>iqonicdesign</h6>
                                                   <p class="mb-0">Web Developer</p>
                                                </div>
                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                             </li>
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><img src="images/user/03.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>W3school</h6>
                                                   <p class="mb-0">Designer</p>
                                                </div>
                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                             </li>
                                          </ul>
                                          <h4 class="mb-3">Professional Skills</h4>
                                          <ul class="suggestions-lists m-0 p-0">
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>Add Professional Skills</h6>
                                                </div>
                                             </li>
                                          </ul>
                                          <h4 class="mt-3 mb-3">College</h4>
                                          <ul class="suggestions-lists m-0 p-0">
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>Add College</h6>
                                                </div>
                                             </li>
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><img src="images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>Lorem ipsum</h6>
                                                   <p class="mb-0">USA</p>
                                                </div>
                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="tab-pane fade" id="lived" role="tabpanel">
                                          <h4 class="mb-3">Current City and Hometown</h4>
                                          <ul class="suggestions-lists m-0 p-0">
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><img src="images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>Georgia</h6>
                                                   <p class="mb-0">Georgia State</p>
                                                </div>
                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                             </li>
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><img src="images/user/02.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>Atlanta</h6>
                                                   <p class="mb-0">Atlanta City</p>
                                                </div>
                                                <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                             </li>
                                          </ul>
                                          <h4 class="mt-3 mb-3">Other Places Lived</h4>
                                          <ul class="suggestions-lists m-0 p-0">
                                             <li class="d-flex mb-4 align-items-center">
                                                <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                                <div class="media-support-info ml-3">
                                                   <h6>Add Place</h6>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="tab-pane fade" id="details" role="tabpanel">
                                          <h4 class="mb-3">About You</h4>
                                          <p>Hi, I’m Bni, I’m 26 and I work as a Web Designer for the iqonicdesign.</p>
                                          <h4 class="mt-3 mb-3">Other Name</h4>
                                          <p>Bini Rock</p>
                                          <h4 class="mt-3 mb-3">Favorite Quotes</h4>
                                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="friends" role="tabpanel">
                        <div class="iq-card">
                           <div class="iq-card-body">
                              <h2>Friends</h2>
                              <div class="friend-list-tab mt-2">
                                 <ul class="nav nav-pills d-flex align-items-center justify-content-left friend-list-items p-0 mb-2">
                                    <li>
                                       <a class="nav-link active" data-toggle="pill" href="#all-friends">All Friends</a>
                                    </li>
                                 </ul>
                                 <div class="tab-content">
                                    <div class="tab-pane fade active show" id="all-friends" role="tabpanel">
                                       <div class="iq-card-body p-0">
                                          <div class="row">
                                             <?php if (count($ALL_FRIENDS)) : ?>
                                                <?php foreach ($ALL_FRIENDS as $friend) : ?>
                                                   <?php $friendDetails = getUserById($friend[2]) ?>
                                                   <div class="col-md-6 col-lg-6 mb-3">
                                                      <div class="iq-friendlist-block">
                                                         <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                               <a href="#">
                                                                  <?php if ($friendDetails['profile_pic']) : ?>
                                                                     <img src="./profile_pic/<?= $friendDetails['profile_pic'] ?>" alt="profile-img" class="img-fluid" width="150">
                                                                  <?php else : ?>
                                                                     <img src="images/user/05.jpg" alt="profile-img" class="img-fluid">
                                                                  <?php endif; ?>
                                                               </a>
                                                               <div class="friend-info ml-3">
                                                                  <h5><?= $friendDetails['firstname'] . " " . $friendDetails['lastname'] ?></h5>
                                                                  <?php $total_friends = count(getAllFriends($friend[2])) ?>
                                                                  <p class="mb-0"><?= $total_friends ?> <?= $total_friends == 1 ? "friend" : "friends"  ?></p>
                                                               </div>
                                                            </div>
                                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                                               <div class="dropdown">
                                                                  <span class="dropdown-toggle btn btn-secondary mr-2" id="dropdownMenuButton01" data-toggle="dropdown" aria-expanded="true" role="button">
                                                                     <i class="ri-check-line mr-1 text-white font-size-16"></i> Friend
                                                                  </span>

                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <?php endforeach; ?>
                                             <?php else : ?>
                                                <div class="friend-info ml-3">
                                                   <p class="mb-0">No friends yet</p>
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
                     <div class="tab-pane fade" id="photos" role="tabpanel">
                        <div class="iq-card">
                           <div class="iq-card-body">
                              <h2>Photos</h2>
                              <div class="friend-list-tab mt-2">
                                 <ul class="nav nav-pills d-flex align-items-center justify-content-left friend-list-items p-0 mb-2">
                                    <li>
                                       <a class="nav-link" data-toggle="pill" href="#your-photos">Your Photos</a>
                                    </li>
                                 </ul>
                                 <div class="tab-content">
                                    <div class="tab-pane fade active show" id="your-photos" role="tabpanel">
                                       <div class="iq-card-body p-0">
                                          <div class="column">
                                             <?php if ($My_POSTS) : ?>
                                                <?php foreach ($My_POSTS as $post) : ?>
                                                   <div class="row-md-6 row-lg-3 mb-3">
                                                      <div class="user-images position-relative overflow-hidden">
                                                         <a href="#">
                                                            <?php if ($post['media']) : ?>
                                                               <?php $MEDIA_CONTENTS = json_decode($post['media'], true) ?>
                                                               <?php foreach ($MEDIA_CONTENTS as $media) : ?>
                                                                  <img src="./post_uploads/<?= $media['file'] ?>" class="img-fluid rounded" alt="Responsive image" width="200">
                                                               <?php endforeach; ?>
                                                            <?php endif; ?>
                                                         </a>
                                                         <div class="image-hover-data">
                                                            <div class="product-elements-icon">
                                                               <ul class="d-flex align-items-center m-0 p-0 list-inline">
                                                                  <li><a href="?user_id=<?= $post['post_id'] ?>" class="pr-3 text-white"><?php $postLikes = getPostLikes($post['post_id']) ?><?= count($postLikes) ?><i class="ri-thumb-up-line"></i> </a></li>
                                                                  <li><a href="?user_id=<?= $post['post_id'] ?>" class="pr-3 text-white"><?php $postComments = getPostComments($post['post_id']) ?><?= count($postComments) ?><i class="ri-thumb-up-line"></i> </a></li>

                                                               </ul>
                                                            </div>
                                                         </div>
                                                         <a href="#" class="image-edit-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit or Remove"><i class="ri-edit-2-fill"></i></a>
                                                      </div>
                                                   </div>
                                                <?php endforeach; ?>
                                             <?php else : ?>
                                                <h3>You do not have any Photos Yet!</h3>
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
               <div class="col-sm-12 text-center">
                  <img src="images/page-img/page-load-loader.gif" alt="loader" style="height: 100px;">
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