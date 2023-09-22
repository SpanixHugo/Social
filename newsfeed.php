<?php require_once("./includes/Session.php"); ?>
<!doctype html>
<html lang="en">
<style>
	li {
		scroll-margin: 10rem;
	}
</style>

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

<body class="right-column-fixed">
	<script>
		const USER_ID = "<?= $_SESSION["SOCIAL_LOGGED_USER"]; ?>"
	</script>
	<script src="./js/api_js/is_active.js"></script>
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
		<?php include("./includes/Header.php") ?>
		<!-- TOP Nav Bar END -->

		<!-- Right Sidebar Panel Start-->
		<?php include("./includes/RightSidebar.php") ?>
		<!-- Right Sidebar Panel End-->

		<!-- Page Content  -->
		<div id="content-page" class="content-page">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 row m-0 p-0">
						<div class="col-sm-12">
							<div id="post-modal-data" class="iq-card iq-card-block iq-card-stretch">
								<div class="iq-card-header d-flex justify-content-between">
									<div class="iq-header-title">
										<h4 class="card-title">Create Post</h4>
									</div>
								</div>
								<div class="iq-card-body" data-toggle="modal" data-target="#post-modal">
									<div class="d-flex align-items-center">
										<div class="user-img">
											<?php if ($USER['profile_pic']) : ?>
												<img src="./profile_pic/<?= $USER['profile_pic'] ?>" alt="userimg" class="avatar-60 rounded-circle">
											<?php else : ?>
												<img src="images/user/11.jpg" alt="userimg" class="avatar-60 rounded-circle">
											<?php endif; ?>
										</div>
										<form class="post-text ml-3 w-100" action="javascript:void();">
											<input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;">
										</form>
									</div>
									<hr>
									<ul class="post-opt-block d-flex align-items-center list-inline m-0 p-0">
										<li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/07.png" alt="icon" class="img-fluid"> Photo/Video</li>
										<li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/08.png" alt="icon" class="img-fluid"> Tag Friend</li>
										<!-- <li class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/09.png" alt="icon" class="img-fluid"> Feeling/Activity</li> -->
										<!-- <li class="iq-bg-primary rounded p-2 pointer">
											<div class="iq-card-header-toolbar d-flex align-items-center">
												<div class="dropdown">
													<span class="dropdown-toggle" id="post-option" data-toggle="dropdown">
														<i class="ri-more-fill"></i>
													</span>
													<div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-option" style="">
														<a class="dropdown-item" href="#">Check in</a>
														<a class="dropdown-item" href="#">Live Video</a>
														<a class="dropdown-item" href="#">Gif</a>
														<a class="dropdown-item" href="#">Watch Party</a>
														<a class="dropdown-item" href="#">Play with Friend</a>
													</div>
												</div>
											</div>
										</li> -->
									</ul>
								</div>
								<div class="modal fade" id="post-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="post-modalLabel">Create Post</h5>
												<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ri-close-fill"></i></button>
											</div>
											<form method="post" action="./handlers/post_handler.php" enctype="multipart/form-data" class="modal-body">
												<div class="d-flex align-items-center">
													<div class="user-img">
														<?php if ($USER['profile_pic']) : ?>
															<img src="./profile_pic/<?= $USER['profile_pic'] ?>" alt="userimg" class="avatar-60 rounded-circle">
														<?php else : ?>
															<img src="images/user/11.jpg" alt="userimg" class="avatar-60 rounded-circle">
														<?php endif; ?>
													</div>
													<input type="file" accept="image/*, video/*" multiple name="medias[]" id="file" hidden>
													<div class="post-text ml-3 w-100" action="javascript:void();">
														<textarea name="content" type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;"></textarea>
													</div>
												</div>
												<hr>
												<ul class="d-flex flex-wrap align-items-center list-inline m-0 p-0">
													<li class="col-md-6 mb-3">
														<div class="iq-bg-primary rounded p-2 pointer mr-3">
															<a href="#" id="file-toggler">
																<img src="images/small/07.png" alt="icon" class="img-fluid"> Photo/Video
														</div>
														</a>
													</li>
													<li class="col-md-6 mb-3">
														<div class="iq-bg-primary rounded p-2 pointer mr-3"><a href="#"></a><img src="images/small/08.png" alt="icon" class="img-fluid"> Tag Friend</div>
													</li>
													
												</ul>
												<hr>
												<div class="other-option">
													<div class="d-flex align-items-center justify-content-between">
														<div class="d-flex align-items-center">
															<div class="user-img mr-3">
																<img src="images/user/1.jpg" alt="userimg" class="avatar-60 rounded-circle img-fluid">
															</div>
															<h6>Your Story</h6>
														</div>
														
													</div>
												</div>
												<button type="submit" name="post" class="btn btn-primary d-block w-100 mt-3">Post</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>

						<?php if ($POSTS) : ?>
							<?php foreach ($POSTS as $post) : ?>
								<div class="col-sm-12">
									<div class="iq-card iq-card-block iq-card-stretch">
										<div class="iq-card-body">
											<div class="user-post-data">
												<div class="d-flex flex-wrap">
													<div class="media-support-user-img mr-3">
														<!-- DEFAULT USER ICON -->
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
														<!-- <p class="mb-0 d-inline-block">Add New Post</p> -->
														<p class="mb-0 text-primary">
															<?= date("D, M Y h:i:s", strtotime($post['date'])); ?>
														</p>
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
																		<div class="icon font-size-20"><i class="ri-close-circle-line"></i></div>
																		<div class="data ml-2">
																			<h6>Hide Post</h6>
																			<p class="mb-0">See fewer posts like this.</p>
																		</div>
																	</div>
																</a>
																<a class="dropdown-item p-3" href="#">
																	<div class="d-flex align-items-top">
																		<div class="icon font-size-20"><i class="ri-user-unfollow-line"></i></div>
																		<div class="data ml-2">
																			<h6>Unfollow User</h6>
																			<p class="mb-0">Stop seeing posts but stay friends.</p>
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

											<div class="comment-area mt-3">
												<div class="d-flex justify-content-between align-items-center">
													<div class="like-block position-relative d-flex align-items-center">
														<div class="d-flex align-items-center">
															<form action="./handlers/post_handler.php" method="post" class="like-data">
																<div class="dropdown">
																	<?php $userLike = getUserPostLike($post["post_id"], $_SESSION['SOCIAL_LOGGED_USER']); ?>
																	<button name="<?= $userLike ? 'unlike' : 'like' ?>" value="<?= $post['post_id'] ?>" class="dropdown-toggle" style="border: none; background-color: transparent;">
																		<img src="images/icon/01.png" style="filter: <?= $userLike ? "none" : "grayscale(.7)"; ?>;" class="img-fluid" alt="">
																	</button>
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
							<div class="col-sm-12">
								<p class="text-center text-white">No posts found.</p>
							</div>
						<?php endif; ?>

					</div>

					<div class="col-lg-4">
						<div class="iq-card">
							<div class="iq-card-header d-flex justify-content-between">
								<div class="iq-header-title">
									<h4 class="card-title">Stories</h4>
								</div>
							</div>
							<div class="iq-card-body">
								<ul class="media-story m-0 p-0">
									<li class="d-flex mb-4 align-items-center">
										<i class="ri-add-line font-size-18"></i>
										<div class="stories-data ml-3">
											<h5>Creat Your Story</h5>
											<p class="mb-0">time to story</p>
										</div>
									</li>
									<li class="d-flex mb-4 align-items-center active">
										<img src="images/page-img/s2.jpg" alt="story-img" class="rounded-circle img-fluid">
										<div class="stories-data ml-3">
											<h5>Anna Mull</h5>
											<p class="mb-0">1 hour ago</p>
										</div>
									</li>
									<li class="d-flex mb-4 align-items-center">
										<img src="images/page-img/s3.jpg" alt="story-img" class="rounded-circle img-fluid">
										<div class="stories-data ml-3">
											<h5>Ira Membrit</h5>
											<p class="mb-0">4 hour ago</p>
										</div>
									</li>
									<li class="d-flex align-items-center">
										<img src="images/page-img/s1.jpg" alt="story-img" class="rounded-circle img-fluid">
										<div class="stories-data ml-3">
											<h5>Bob Frapples</h5>
											<p class="mb-0">9 hour ago</p>
										</div>
									</li>
								</ul>
								<a href="#" class="btn btn-primary d-block mt-3">See All</a>
							</div>
						</div>
						<div class="iq-card">
							<div class="iq-card-header d-flex justify-content-between">
								<div class="iq-header-title">
									<h4 class="card-title">Events</h4>
								</div>
								<div class="iq-card-header-toolbar d-flex align-items-center">
									<div class="dropdown">
										<span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" role="button">
											<i class="ri-more-fill"></i>
										</span>
										<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="">
											<a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
											<a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
											<a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
											<a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
											<a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
										</div>
									</div>
								</div>
							</div>
							<div class="iq-card-body">
								<ul class="media-story m-0 p-0">
									<li class="d-flex mb-4 align-items-center ">
										<img src="images/page-img/s4.jpg" alt="story-img" class="rounded-circle img-fluid">
										<div class="stories-data ml-3">
											<h5>Web Workshop</h5>
											<p class="mb-0">1 hour ago</p>
										</div>
									</li>
									<li class="d-flex align-items-center">
										<img src="images/page-img/s5.jpg" alt="story-img" class="rounded-circle img-fluid">
										<div class="stories-data ml-3">
											<h5>Fun Events and Festivals</h5>
											<p class="mb-0">1 hour ago</p>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="iq-card">
							<div class="iq-card-header d-flex justify-content-between">
								<div class="iq-header-title">
									<h4 class="card-title">Upcoming Birthday</h4>
								</div>
							</div>
							<div class="iq-card-body">
								<ul class="media-story m-0 p-0">
									<li class="d-flex mb-4 align-items-center">
										<img src="images/user/01.jpg" alt="story-img" class="rounded-circle img-fluid">
										<div class="stories-data ml-3">
											<h5>Anna Sthesia</h5>
											<p class="mb-0">Today</p>
										</div>
									</li>
									<li class="d-flex align-items-center">
										<img src="images/user/02.jpg" alt="story-img" class="rounded-circle img-fluid">
										<div class="stories-data ml-3">
											<h5>Paul Molive</h5>
											<p class="mb-0">Tomorrow</p>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="iq-card">
							<div class="iq-card-header d-flex justify-content-between">
								<div class="iq-header-title">
									<h4 class="card-title">Suggested Pages</h4>
								</div>
								<div class="iq-card-header-toolbar d-flex align-items-center">
									<div class="dropdown">
										<span class="dropdown-toggle" id="dropdownMenuButton01" data-toggle="dropdown" aria-expanded="false" role="button">
											<i class="ri-more-fill"></i>
										</span>
										<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01" style="">
											<a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
											<a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
											<a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
											<a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
											<a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
										</div>
									</div>
								</div>
							</div>
							<div class="iq-card-body">
								<ul class="suggested-page-story m-0 p-0 list-inline">
									<li class="mb-3">
										<div class="d-flex align-items-center mb-3">
											<img src="images/page-img/42.png" alt="story-img" class="rounded-circle img-fluid avatar-50">
											<div class="stories-data ml-3">
												<h5>Iqonic Studio</h5>
												<p class="mb-0">Lorem Ipsum</p>
											</div>
										</div>
										<img src="images/small/img-1.jpg" class="img-fluid rounded" alt="Responsive image">
										<div class="mt-3"><a href="#" class="btn d-block"><i class="ri-thumb-up-line mr-2"></i> Like Page</a></div>
									</li>
									<li class="">
										<div class="d-flex align-items-center mb-3">
											<img src="images/page-img/42.png" alt="story-img" class="rounded-circle img-fluid avatar-50">
											<div class="stories-data ml-3">
												<h5>Cakes & Bakes </h5>
												<p class="mb-0">Lorem Ipsum</p>
											</div>
										</div>
										<img src="images/small/img-2.jpg" class="img-fluid rounded" alt="Responsive image">
										<div class="mt-3"><a href="#" class="btn d-block"><i class="ri-thumb-up-line mr-2"></i> Like Page</a></div>
									</li>
								</ul>
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
	<script>
		const photoBtn = document.querySelector("#file-toggler")
		const file = document.querySelector("#file")

		photoBtn.addEventListener("click", () => {
			file.click()
		})
	</script>
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