<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
    <title>
        CakePHP
		<?php //echo $cakeDescription ?>:
		<?ph p// echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

//		echo $this->Html->css('cake.generic');

        // jQuery CDN
        echo $this->Html->script('//code.jquery.com/jquery-1.10.2.min.js');

        // Twitter Bootstrap 3.0 CDN
        echo $this->Html->css('//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css');
        echo $this->Html->script('//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js');


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body style="padding-top: 70px;">

	<div id="container">
		<div id="header">
            <h1><?php // echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
             <?php
//                if ($user) {
//                    echo $this->Html->link('ログアウト', array('controller' => 'users', 'action' => 'logout'));
//                } else {
//                    echo $this->Html->link('ログイン', array('controller' => 'users', 'action' => 'login'));
//                }
?>
           <nav class="navbar navbar-fixed-top">
                <div id="navbar-header">
                <?php
                    if($user) {
                        echo $this->Html->link(
                            'ログアウト',
                             array('controller' => 'users', 'action' => 'logout'),
                             array('class' => 'navbar-brand' )
                         );
                        echo "<div class='navbar-brand'>";
                        echo sprintf("ようこそ %s さん", $user['username']);
                        echo "</div>";
                    } else {
                        echo $this->Html->link(
                            'ログイン',
                             array('controller' => 'users', 'action' => 'login'),
                             array('class' => 'navbar-brand')
                        );
                        echo $this->Html->link(
                            '登録',
                            array('controller' => 'users', 'action' => 'add'),
                            array('class' => 'navbar-brand')
                        );
                    }
                echo "<br />";
                ?>
                </div>
            </nav> 

		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
<!--
           <?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
            </p>
-->
		</div>
	</div>
	<?php // echo $this->element('sql_dump'); ?>
</body>
</html>
