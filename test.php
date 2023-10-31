<?php 

$users = [
  [
    "id" => 1,
    "name" => "John",
  ],
  [
    "id" => 2,
    "name" => "Smith",
  ],
];

$result = array_column($users, "id"); 

print_r($result);
?>
<div class="iq-card">
<div class="iq-card-header d-flex justify-content-between">
   <div class="iq-header-title">
      <h4 class="card-title">Friends</h4>
   </div>
   <div class="iq-card-header-toolbar d-flex align-items-center">
      <p class="m-0"><a href="javacsript:void();">Add New </a></p>
   </div>
</div>
<div class="iq-card-body">
   <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
      <?php if(count($ALL_FRIENDS)): ?>
         <?php foreach($ALL_FRIENDS as $friend): ?>
            <?php $friendDetails = getUserById($friend[2]) ?>
            <li class="col-md-4 col-6 pl-2 pr-0 pb-3">
               <a href="javascript:void();">
                  <?php if($friendDetails['profile_pic']): ?>
                     <img src="./profile_pic/<?=$friendDetails['profile_pic'] ?>" class="img-fluid rounded-circle mr-3" alt="user">
                     <?php else: ?>
                        <!-- <img src="images/user/11.png" alt="profile-img" class="avatar-130 img-fluid" /> -->
                        <img src="images/user/11.png" alt="gallary-image" class="img-fluid" /></a>
               <?php endif; ?>
               <h6 class="mt-2"><?= $friendDetails['firstname']." ".$friendDetails['lastname'] ?></h6>
            </li>
         <?php endforeach; ?>
      <?php else: ?>
      <?php endif;?>
      
   </ul>
</div>
</div>

<div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/02.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Anne Fibbiyon Like Your Post</h6>
                                    <p class="mb-0">15  ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-danger rounded"><i class="ri-heart-line"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/03.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Barry Cuda add Story</h6>
                                    <p class="mb-0">40  ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-primary rounded"><i class="ri-award-line"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/04.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Cliff Hanger posted a comment on your status update</h6>
                                    <p class="mb-0">42  ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-success rounded"><i class="ri-chat-4-line"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/4.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Rick O'Shea posted a comment on your photo</h6>
                                    <p class="mb-0">50  ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-success rounded"><i class="ri-chat-4-line"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/05.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Brock Lee Sent a Friend Request</h6>
                                    <p class="mb-0">1 hour ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-warning rounded"><i class="ri-reply-line"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/06.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Ira Membrit shared your status update</h6>
                                    <p class="mb-0">1 hour ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-info rounded"><i class="ri-share-line"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/11.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Paul Molive and 3 ther have Birthday Today</h6>
                                    <p class="mb-0">3 houe ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-danger rounded"><i class="las la-birthday-cake"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/07.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Petey Cruiser Sent a Friend request</h6>
                                    <p class="mb-0">1 day ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-warning rounded"><i class="ri-reply-line"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/08.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Bob Frapples and 45 other Like Your Pst on timeline</h6>
                                    <p class="mb-0">1 week ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-danger rounded"><i class="ri-heart-line"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/12.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Maya Didas share Your Post</h6>
                                    <p class="mb-0">1 month ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-info rounded"><i class="ri-share-line"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/09.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Sal Monella Add Photo with You</h6>
                                    <p class="mb-0">1 month ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-primary rounded"><i class="ri-award-line"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/10.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Barb Dwyer commented on your new profile status</h6>
                                    <p class="mb-0">2 month ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-success rounded"><i class="ri-chat-4-line"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/13.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Terry Aki commented on your new profile status</h6>
                                    <p class="mb-0">2 month ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-success rounded"><i class="ri-chat-4-line"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-body">
                           <ul class="notification-list m-0 p-0">
                              <li class="d-flex align-items-center">
                                 <div class="user-img img-fluid"><img src="images/user/14.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Paige Turner Posted in Development Community</h6>
                                    <p class="mb-0">3 month ago</p>
                                 </div>
                                 <div class="d-flex align-items-center">
                                    <a href="javascript:void();" class="mr-3 iq-notify iq-bg-primary rounded"><i class="ri-award-line"></i></a>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                       <div class="dropdown">
                                          <span class="dropdown-toggle" data-toggle="dropdown">
                                          <i class="ri-more-fill"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                             <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                             <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                             <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                             <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>