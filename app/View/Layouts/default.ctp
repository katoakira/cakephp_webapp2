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

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
    <title>WebApplication</title>
	<?php
		echo $this->Html->meta('icon');

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
           <nav class="navbar navbar-fixed-top">
                <div id="navbar-inner">
                    <div class="container">
                    <?php
                        if($user) {
                            echo $this->Html->link(
                                'ログアウト',
                                 array('controller' => 'users', 'action' => 'logout'),
                                 array('class' => 'navbar active' )
                             );
                            echo "<div class='navbar active'>";
                            echo sprintf("ようこそ %s さん", $user['username']);
                            echo "</div>";
                        } else {
                            echo $this->Html->link(
                                'ログイン',
                                 array('controller' => 'users', 'action' => 'login'),
                                 array('class' => 'navbar active')
                            );
                            echo $this->Html->link(
                                '新規登録',
                                array('controller' => 'users', 'action' => 'add'),
                                array('class' => 'navbar active')
                            );
                        }
                    echo "<br />";
                    ?>
                    </div>
                </div>
            </nav> 

		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php // echo $this->element('sql_dump'); ?>
</body>
</html>
