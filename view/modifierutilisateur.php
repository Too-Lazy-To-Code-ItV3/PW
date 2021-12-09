<?php
session_start();
    require_once     '../Controller/utilisateurC.php';
    require_once '../Model/utilisateur.php' ;
    $utilisateurC = new utilisateurC();
    $etudiantC = new etudiantC();
    $profC = new profC();
    
    if (isset($_POST['ID_utilisateur'] ) && isset($_POST['email']  ) && isset($_POST['password']  ) && isset($_POST['name']  ) && isset($_POST['first_name']  ) && isset($_POST['date_of_birth']  ) && isset($_POST['role']  )&& isset($_POST['classe']  )) 
    {
        echo $_POST['ID_utilisateur'] ;
        $utilisateur = new utilisateur($_POST['ID_utilisateur'], $_POST['email'], $_POST['password'], $_POST['name'], $_POST['first_name'], $_POST['date_of_birth'], $_POST['role'],$_FILES["profilpicture"]["name"]);
      $etudiant = new etudiant( $_POST['ID_utilisateur'], $_POST['email'], $_POST['password'], $_POST['name'], $_POST['first_name'], $_POST['date_of_birth'], $_POST['role'],$_FILES["profilpicture"]["name"], $_POST['classe'] );
       $utilisateurC->modifierutilisateur($utilisateur);
          $etudiantC->modifieretudiant($etudiant);
          $target_dir = "../Assets/uploads/";
      $target_file = $target_dir . basename($_FILES["profilpicture"]["name"]);
      if (move_uploaded_file($_FILES["profilpicture"]["tmp_name"], $target_file)) {
          echo "KHIDMET YA RJEL";
      }
            header('Location:afficherutilisateur.php');
    }
    else if (isset($_POST['ID_utilisateur'] ) && isset($_POST['email']  ) && isset($_POST['password']  ) && isset($_POST['name']  ) && isset($_POST['first_name']  ) && isset($_POST['date_of_birth']  ) && isset($_POST['role']  ) && isset($_POST['specialite']  )) 
    {
      
        echo $_POST['ID_utilisateur'] ;
            $utilisateur = new utilisateur($_POST['ID_utilisateur'] , $_POST['email'] , $_POST['password'] , $_POST['name'] , $_POST['first_name'] , $_POST['date_of_birth'] , $_POST['role'] ,$_FILES["profilpicture"]["name"]);
            $utilisateurC->modifierutilisateur($utilisateur);
          $prof = new prof($_POST['ID_utilisateur'] , $_POST['email'] , $_POST['password'] , $_POST['name'] , $_POST['first_name'] , $_POST['date_of_birth'] , $_POST['role'], $_FILES["profilpicture"]["name"],$_POST['specialite'] );
            $profC->modifierprof($prof);
            $target_dir = "../Assets/uploads/";
      $target_file = $target_dir . basename($_FILES["profilpicture"]["name"]);
      if (move_uploaded_file($_FILES["profilpicture"]["tmp_name"], $target_file)) {
          echo "KHIDMET YA RJEL";
      }
            header('Location:afficherutilisateur.php');
    }
    else
    {
        $a = $utilisateurC->getutilisateurbyID($_GET['ID_utilisateur']) ;
        $b=$etudiantC->getetudiantbyID($_GET['ID_utilisateur']) ;
        $c=$profC->getprofbyID($_GET['ID_utilisateur']) ;
    }



?>

<html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Tables - Chameleon Admin - Modern Bootstrap 4 WebApp & Dashboard HTML Template + UI Kit</title>
    <link rel="apple-touch-icon" href="../Assets/theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../Assets/theme-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../Assets/theme-assets/css/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="../Assets/theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../Assets/theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../Assets/theme-assets/css/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
              <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
                <ul class="dropdown-menu">
                  <li class="arrow_box">
                    <form>
                      <div class="input-group search-box">
                        <div class="position-relative has-icon-right full-width">
                          <input class="form-control" id="search" type="text" placeholder="Search here...">
                          <div class="form-control-position navbar-search-close"><i class="ft-x">   </i></div>
                        </div>
                      </div>
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">         
              <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language"></span></a>
                <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                  <div class="arrow_box"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-ru"></i> Russian</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-es"></i> Spanish</a></div>
                </div>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail">             </i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><i class="ft-book"></i> Read Mail</a><a class="dropdown-item" href="#"><i class="ft-bookmark"></i> Read Later</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Mark all Read       </a></div>
                </div>
              </li>
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online"><img src="../Assets/theme-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="../Assets/theme-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><span class="user-name text-bold-700 ml-1">John Doe</span></span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="../Assets/theme-assets/images/backgrounds/02.jpg">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Chameleon admin logo" src="../Assets/theme-assets/images/logo/logo.png"/>
              <h3 class="brand-text">Chameleon</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="index.html"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <li class=" nav-item"><a href="charts.html"><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">Charts</span></a>
          </li>
          <li class=" nav-item"><a href="icons.html"><i class="ft-droplet"></i><span class="menu-title" data-i18n="">Icons</span></a>
          </li>
          <li class=" nav-item"><a href="cards.html"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Cards</span></a>
          </li>
          <li class=" nav-item"><a href="buttons.html"><i class="ft-box"></i><span class="menu-title" data-i18n="">Buttons</span></a>
          </li>
          <li class=" nav-item"><a href="typography.html"><i class="ft-bold"></i><span class="menu-title" data-i18n="">Typography</span></a>
          </li>
          <li class="active"><a href="tables.html"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Tables</span></a>
          </li>
          <li class=" nav-item"><a href="form-elements.html"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Form Elements</span></a>
          </li>
          <li class=" nav-item"><a href="https://themeselection.com/demo/chameleon-admin-template/documentation"><i class="ft-book"></i><span class="menu-title" data-i18n="">Documentation</span></a>
          </li>
        </ul>
      </div><a class="btn btn-danger btn-block btn-glow btn-upgrade-pro mx-1" href="https://themeselection.com/products/chameleon-admin-modern-bootstrap-webapp-dashboard-html-template-ui-kit/" target="_blank">Download PRO!</a>
      <div class="navigation-background"></div>
    </div>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Tables</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Tables
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Basic Tables start -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">etudiants</h4>
				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
				<div class="heading-elements">
					<ul class="list-inline mb-0">
						<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
						<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
						<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
						<li><a data-action="close"><i class="ft-x"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="card-content collapse show">
				<div class="card-body">
					<div class="table-responsive">
					<form action="" method="POST" enctype="multipart/form-data">
						<table class="table" border="1" align="center">
						
                        <label for="ID_utilisateur">
                        </label>
                    
                    <input type="number" name="ID_utilisateur" id="ID_utilisateur" maxlength="20" value="<?php echo $a['ID_utilisateur'];?>"  hidden>
                   
                    <tr>
                    <td>
                        <label for="profilpicture">profil picture:
                        </label>
                    </td>
                    <td>
                   <img onclick="pictureclick()" id="profildisplay" width=200  src="../Assets/uploads/<?php echo $a['profilpicture'];?>">
                    <input type="file" accept="image/*" name="profilpicture" onchange="displayImage(this)" id="profilpicture" style="width:50%;float:left;margin:0 10px 0 -200px; display:none; "  >
                                                 <img  onclick="pictureclick()" id="profildisplay" style="width:10%;margin:0 90px 0 0px; border-radius:10%; display:block;"/>
                   
                   </td></tr>        
				<tr>
                    <td>
                        <label for="email">email:
                        </label>
                    </td>
                    <td><input type="text" value="<?php echo $a['email'];?>" name="email" id="email" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="password">password:
                        </label>
                    </td>
                    <td><input type="text" value="<?php echo $a['password'];?>" name="password" id="password" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="name">name:
                        </label>
                    </td>
                    <td><input type="text" value="<?php echo $a['name'];?>" name="name" id="name" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="first_name">first name:
                        </label>
                    </td>
                    <td><input type="text" value="<?php echo $a['first_name'];?>" name="first_name" id="first_name" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date_of_birth">date of birth:
                        </label>
                    </td>
                    <td><input type="text" value="<?php echo $a['date_of_birth'];?>" name="date_of_birth" id="date_of_birth" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="role">role:
                        </label>
                    </td>
                    <td><input type="text" value="<?php echo $a['role'];?>" name="role" id="role" maxlength="20" readonly></td>
                </tr>
                <tr>
                    <td>
                        <label for="classe">classe:
                        </label>
                    </td>
                    <td><input type="text" value="<?php echo $b['classe'];?>" name="classe" id="classe" maxlength="20" hidden></td>
                </tr>
                <tr>
                    <td>
                        <label for="specialite">specialite:
                        </label>
                    </td>
                    <td><input type="text" value="<?php echo $c['specialite'];?>" name="specialite" id="specialite" maxlength="20" hidden ></td>
                </tr>
               

                <tr>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
  </body>
  <script src="js/load.js"></script>
  <script src="js/click.js"></script>
</html>