<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo C_SITE_NAME; ?></title>
	<?php
		//echo $this->Html->meta('icon');
		echo $this->Html->script('jquery-1.10.2.min.js');
		echo $this->Html->script('bootstrap.min.js');
                echo $this->Html->css('bootstrap.min');
		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
  <nav class="navbar  navbar-default" role="navigation" style="margin-bottom:0px;  background-color: #90ee90;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
            <a class="navbar-brand" href="/<?php echo S_SITE_CONTEXT; ?>"><font style="color:green; font-size: 24px;"><?php echo C_SITE_NAME;  ?></font>
            </a>
        </li>
        <li>
		<?php echo $this->Html->link(__('| Sensors |'), array( 'controller'=>'sensors' ,'action' => 'index')
							    ,array('class' => ' ','escape' => false));
		 ?>
            </a>
        </li>

        <li>
		<?php echo $this->Html->link(__('Aidats |'), array( 'controller'=>'aidats' ,'action' => 'index')
							    ,array('class' => ' ','escape' => false));
			 ?>
            </a>
        </li>

      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="#" onClick="form_logout('{$PHP_DIR}/login_index.php?logout=1');" id="id-logout"> | Logout 
            </a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<div id="container">
		<div id="header">
<!--
			<h1><?php echo $this->Html->link($cakeDescription, 'https://cakephp.org'); ?></h1>
 -->
		</div>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
<!--
		<?php echo $this->element('sql_dump'); ?>
 -->
</body>
</html>
