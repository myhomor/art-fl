<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=CHtml::encode($this->pageTitle)?></title>
    <!-- BOOTSTRAP STYLES-->
	<!--<link href="http://art-up.me/css/reset.css" rel="stylesheet" />-->
    <link href="<?=Yii::app()->request->baseUrl?>/<?=$this->tempDir?>/<?=Yii::app()->theme->name?>/css/bootstrap.css" rel="stylesheet" />
    
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="<?=Yii::app()->request->baseUrl?>/<?=$this->tempDir?>/<?=Yii::app()->theme->name?>/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="<?=Yii::app()->request->baseUrl?>/<?=$this->tempDir?>/<?=Yii::app()->theme->name?>/css/style.css" rel="stylesheet" />
    <link href="<?=Yii::app()->request->baseUrl?>/<?=$this->tempDir?>/<?=Yii::app()->theme->name?>/css/jquery-ui.min.css" rel="stylesheet" />
      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?=Yii::app()->request->baseUrl?>/<?=$this->tempDir?>/<?=Yii::app()->theme->name?>/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?=Yii::app()->request->baseUrl?>/<?=$this->tempDir?>/<?=Yii::app()->theme->name?>/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?=Yii::app()->request->baseUrl?>/<?=$this->tempDir?>/<?=Yii::app()->theme->name?>/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?=Yii::app()->request->baseUrl?>/<?=$this->tempDir?>/<?=Yii::app()->theme->name?>/js/custom.js"></script>
    <script src="<?=Yii::app()->request->baseUrl?>/<?=$this->tempDir?>/<?=Yii::app()->theme->name?>/js/jquery-ui.min.js"></script>
	
	
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=cyrillic,latin' rel='stylesheet' type='text/css'>
<style>
body{font-family: 'PT Sans Narrow', sans-serif!important;}
		
/* forms */
	
.tit-bl{
	font-size: 15px;
	margin-bottom: 18px;
	border-bottom: 1px solid #BAB9B9;
	font-weight: bold;
}

.form .alert
{
	border-color: #ebccd1;
	margin: 5px 15px;  
}

label{font-weight:normal}

.a-right{text-align:right}
.a-center{text-align:center}

.w100{width:100%}
input.btn {
	background: #fff;
	border: 1px solid #CCC;
}
.btn.bg-green{
	background: #5CB85C;
	color: #fff;
	border-color: #5CB85C;
}
.btn-full{
	padding: 5px 28px;
	min-width: 150px;
	font-size: 20px;
	width: 50%;
}
.btn-big{
	padding: 5px 28px;
	min-width: 150px;
	font-size: 20px;
	width: 50%;
}
.wr-box{
	display: inline-block;
	width: 100%;
	margin-bottom: 20px;
}

ul.ul-menu {
	border-bottom: 2px solid #D2D2D2;
}
ul.ul-menu li {
	display: inline-block;
	padding: 10px;
	border: 1px solid #fff;
	border-bottom: none;
	cursor:pointer;
}
ul.ul-menu li:hover {
	border: 1px solid rgb(210, 210, 210);
	border-bottom: none;
}
ul.ul-menu li.active
{
	border: 1px solid rgb(210, 210, 210);
	border-bottom: none;
} 
.b-hidden{
	display:none;
}
.up-content
{
	display: inline-block;
	width: 100%;
}


/* service */
.wr-service {
  margin-bottom: 20px;
}
.wr-service div.wr-img {
  position: relative;
}
.wr-img div.wr-price
{
	position: absolute;
	bottom: 0px;
	padding: 2px 10px;
	background: rgba(0, 0, 0, 0.8);
	right: 0px;
	z-index: 10;
	color: #fff;
	font-size: 16px;
}

</style>
</head>

<body>

 <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class="navbar-brand" href="index.html">Art<b>UP</b>.ME 

                </a>
            </div>

            <div class="notifications-wrapper">
<ul class="nav">
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task 1</strong>
                                                <span class="pull-right text-muted">60% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    <span class="sr-only">60% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task 2</strong>
                                                <span class="pull-right text-muted">30% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                                    <span class="sr-only">30% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task 3</strong>
                                                <span class="pull-right text-muted">80% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                    <span class="sr-only">80% Complete (warning)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task 4</strong>
                                                <span class="pull-right text-muted">90% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                    <span class="sr-only">90% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>See Tasks List + </strong>
                                    </a>
                                </li>
                            </ul>
                </li>
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user-plus"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    <?if(!Yii::app()->user->isGuest):?>
						<li><a href="/user/"><i class="fa fa-user-plus"></i> My Profile</a>
						</li>
						<li class="divider"></li>
						<li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a>
						 </li>
					<?else:?>
						<li><a href="/login"><i class="fa fa-sign-out"></i> Login</a>
						 </li>
					<?endif?>
                    </ul>
                </li>
            </ul>
               
            </div>
        </nav>
        <!-- /. NAV TOP  -->
		
		
		 <nav  class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
               
				<?if(!Yii::app()->user->isGuest)
				{
					$this->widget(
						'application.extensions.userLogo.LogoClass',
						array(
							'template' => 'nav_logo',
							'u_id' => Yii::app()->user->ID,
						) 
					);
				}?>
				
			<?$this->widget(
				'application.extensions.renderMenu.WClass', 
				array( 
					'name' => 'main_left',//имя файла меню. по умолчанию берется имя шаблона
					'template' => 'main_left',//имя шаблона. по умолчанию index
				)
			)?>
            </div>

        </nav>
		
		<!--end l_menu-->
		
		<!--content-->
		<div id="page-wrapper" class="page-wrapper-cls">
			<div id="page-inner">
			<?php echo $content; ?>
			</div>
		</div>
		
	<footer>
        © <?=date('Y')?> YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
		<?=Yii::powered()?>
    </footer>
</div>		
		


</body>

</html>