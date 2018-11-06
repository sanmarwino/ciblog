<!DOCTYPE html>
<html lang="en">
<head>
	<title>Winds Gate | <?= $pageTitle? $pageTitle : "Software Develpment Company" ?></title>
	<meta charset="utf-8">
<!-- 	<meta name="description" content="<?= $meta_description? $meta_description : '' ?>" /> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
	<link rel="icon" href="<?php echo base_url() ?>assets/favicon1.ico">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<?php if($this->session->has_userdata('logged_in')) { ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin.css">
	<?php } ?>
	<script src="<?php echo base_url() ?>assets/js/ckeditor/ckeditor.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119607822-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119607822-1');
	</script>
</head>

<body>
<?php if($this->session->has_userdata('logged_in')) { ?>
<div id="container-fluid-admin">
<div class="row" id="side-bar-content">
    <nav class="col-sm-2 navbar navbar-fixed"  id="nav-left">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="glyphicon glyphicon-align-justify"></span>
	    </button>
    	<div class="sidebar-header">
            <h3>ADMIN</h3>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
		<ul>
			<li class="top-list">
				<a>
					<span class="glyphicon glyphicon-envelope"></span>
					<span class="link-text">Posts</span>
				</a>
			</li> 
            <li class="sub-list">
            	<a href="<?php echo base_url('posts'); ?>">
            		<span class="glyphicon glyphicon-check"></span>
            		<span class="link-text">Published Posts</span>
            	</a>
            </li>
            <li class="sub-list">
            	<a href="<?php echo base_url(); ?>posts/list/drafts">
	            	<span class="glyphicon glyphicon-edit"></span>
	            	<span class="link-text">Draft Posts</span>
            	</a>
            </li>
            <li class="sub-list">
            	<a href="<?php echo base_url('posts/create'); ?>">
	            	<span class="glyphicon glyphicon-pencil"></span>
	            	<span class="link-text">Create Post</span>
            	</a>
            </li>
			<li class="sub-list">
            	<a href="<?php echo base_url('blog/deleted'); ?>">
	            	<span class="glyphicon glyphicon-trash"></span>
	            	<span class="link-text">Trash</span>
            	</a>
            </li>
			<li class="top-list">
				<a href="<?php echo base_url('categories'); ?>">
					<span class="glyphicon glyphicon-list"></span>
					<span class="link-text">Categories</span>
				</a>
			</li> 
			<?php if(!$this->session->userdata('logged_in')) : ?>
				<li><a onclick="document.getElementById('id01').style.display='block'" href="<?php echo site_url('users/login'); ?>">Login</a>
				<li><a href="<?php echo site_url('users/register'); ?>">Register</a>
			<?php endif; ?>

			<?php if($this->session->userdata('logged_in')) { ?>
				<li id="sidenav-logout"><span class="glyphicon glyphicon-plus"></span><a href="<?php echo base_url('users/register'); ?>">Add Account</a></li>
				<li id="sidenav-logout">
					<span class="glyphicon glyphicon-log-out"></span>
					<a href="<?php echo site_url('users/logout'); ?>">Logout</a>
				</li>
			<?php } ?>
		</ul>
	</div>
	</nav>
	<div class="col-sm-10" id="admin-content">
<?php } else { ?>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span> 
			  </button>
			<a class="navbar-brand" href="http://windsgate.com/"><img src="<?php echo base_url() ?>assets/images/logo_small.png"	></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo site_url() ?>">HOME</a></li>
				<li><a href="<?php echo site_url('wg/about-us') ?>" name="about">ABOUT US</a></li>
				<li><a href="<?php echo site_url('wg/career') ?>">CAREER</a></li>
				<li><a href="<?php echo site_url('wg/contact') ?>">CONTACT</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">SERVICES<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('wg/biomentrics') ?>">Biomentrics</a></li>
						<li><a href="<?php echo site_url('wg/software-development') ?>">Software Development</a></li>
					</ul>
				</li>
				<li><a href="<?php echo site_url('wg/blog') ?>">BLOG</a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="jumbotron text-center">
  <img class="logo" src="<?php echo base_url() ?>assets/images/logoindex.png">
  <p>Philippine Software Development Inc.</p>
  <?php if(current_url() == "http://".$_SERVER['SERVER_NAME']."/windsgate/") { ?>
  	<form class="form-inline">
		<div class="input-group">
		  <input type="email" class="form-control" size="50" placeholder="Email Address" required>
		  <div class="input-group-btn">
			<button type="button" class="btn btn-primary">Subscribe</button>
		  </div>
		</div>
	</form>
  <?php } ?>
</div>
<?php } ?>
<div id="container" class="container-fluid container-fluid-color ">
	<?php if($this->session->has_userdata('logged_in')) { ?>
	<div class="container">
		<div class="row" id="nav-head">
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<ul class="nav navbar-nav navbar-right">
					<li class=" head"><a href="<?php echo base_url('users/register'); ?>"><span class="glyphicon glyphicon-plus"></span>Add Account</a></li>
					<li class="dropdown head">
					<a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo $this->session->userdata('username'); ?><span class="caret"></span></a>
					<ul  class="dropdown-menu">
						<li><a href="<?php echo site_url('users/update');?>"><span class="glyphicon glyphicon-cog"></span>Change Password</a></li>
			            <li><a href="<?php echo site_url('users/logout'); ?>"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
			         </ul>
					</li>
				</ul>
			</nav>	
		</div>
	</div>
</div>
	<div class="blogs-posts">
	<?php } ?>

		<?php if($this->session->flashdata('mssg')): ?>
			<?php echo '<p id="alert" class="alert alert-'.$this->session->flashdata('type').'">'.$this->session->flashdata('mssg').'</p>'; ?>
		<?php endif; ?>

