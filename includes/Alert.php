<?php

if (isset($_SESSION['SOCIAL_ALERT'])) {
  echo "ERROR";
  $ALERT = json_decode($_SESSION['SOCIAL_ALERT'], true);
?>
  <style style="display: none;">
    .float-alert {
      position: fixed;
      width: 100%;
      right: 20px;
      top: 20px;
      max-width: 400px;
      z-index: 1000000000000000;
    }

    .float-alert .alert {
      width: 100%;
    }
  </style>
  <div class="float-alert">
    <?php
    // WARNING TOAST
    if ($ALERT['type'] == "warning") {
    ?>
      <div class="alert text-white bg-warning" role="alert">
        <div class="iq-alert-icon">
          <i class="ri-alert-line"></i>
        </div>
        <div class="iq-alert-text"><?= $ALERT['message']; ?></div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="ri-close-line"></i>
        </button>
      </div>
    <?php
    }

    // ERROR TOAST
    if ($ALERT['type'] == "error") {
    ?>
      <div class="alert text-white bg-danger" role="alert">
        <div class="iq-alert-icon">
          <i class="ri-information-line"></i>
        </div>
        <div class="iq-alert-text"><?= $ALERT['message']; ?></div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="ri-close-line"></i>
        </button>
      </div>
    <?php
    }

    // INFO TOAST
    if ($ALERT['type'] == "info") {
    ?>
      <div class="alert text-white bg-info" role="alert">
        <div class="iq-alert-icon">
          <i class="ri-information-line"></i>
        </div>
        <div class="iq-alert-text"><?= $ALERT['message']; ?></div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="ri-close-line"></i>
        </button>
      </div>
    <?php
    }

    // SUCCESS TOAST
    if ($ALERT['type'] == "success") {
    ?>
      <div class="alert text-white bg-primary" role="alert">
        <div class="iq-alert-icon">
          <i class="ri-alert-line"></i>
        </div>
        <div class="iq-alert-text"><?=  $ALERT['message']; ?></div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="ri-close-line"></i>
        </button>
      </div>
  <?php
    }

    unset($_SESSION['SOCIAL_ALERT']);
  }
  ?>
  </div>
