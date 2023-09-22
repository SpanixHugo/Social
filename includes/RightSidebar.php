<?php
$FRIENDS = getUsersFriends($_SESSION['SOCIAL_LOGGED_USER']);
// print_r($FRIENDS);
?>
<div class="right-sidebar-mini right-sidebar">
  <div class="right-sidebar-panel p-0">
    <div class="iq-card shadow-none">
      <div class="iq-card-body p-0">
        <div class="media-height p-3">
          <?php if (count($FRIENDS)) : ?>
            <?php foreach ($FRIENDS as $friend) : ?>
              <?php $friendDetails = getUserById($friend["person_id"]); ?>
              <!-- FRIEND CARD -->
              <div class="media align-items-center mb-4">
                <div class="iq-profile-avatar <?= $friendDetails["is_active"] == 1 ? "status-online" : "";  ?>">
                  <?php if($friendDetails['profile_pic']): ?>
                    <img class="rounded-circle avatar-50" src="./profile_pic/<?= $friendDetails['profile_pic']; ?>" alt="<?= $friendDetails['firstname'] ?>">
                  <?php else: ?>
                    <img class="rounded-circle avatar-50" src="images/user/11.jpg" alt="">
                  <?php endif; ?>
                </div>
                <div class="media-body ml-3">
                  <!-- TODO: REDIRECT LINK TO CHAT -->
                  <h6 class="mb-0">
                    <a href="./chat?user=<?= $friend["person_id"]; ?>"><?= $friendDetails['firstname'] . " " . $friendDetails['lastname'] ?></a>
                  </h6>
                  <p class="mb-0">Just Now</p>
                </div>
              </div>
              <!-- FRIEND CARD END -->
            <?php endforeach; ?>
          <?php else : ?>
            <div class="d-flex justify-content-center">
              <p class="py-2 text-muted">No friends yet.</p>
              <a href="friend-request" class="text-info">Add friend</a>
            </div>
          <?php endif; ?>
        </div>
        <div class="right-sidebar-toggle bg-primary mt-3">
          <i class="ri-arrow-left-line side-left-icon"></i>
          <i class="ri-arrow-right-line side-right-icon"><span class="ml-3 d-inline-block">Close Menu</span></i>
        </div>
      </div>
    </div>
  </div>
</div>