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
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->Html->charset(); ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?= $cakeDescription; ?>:
            <?= $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('bootstrap.min.css');
        echo $this->Html->css('heroic-features.css');        
        echo $this->Html->css('main.css');        
        echo $this->Html->script('jquery-2.1.3.min');
        echo $this->Html->script('bootstrap.min');        
        echo $this->Html->script('common');        
        echo $this->Html->script('ckeditor/ckeditor');
       


        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>      
    </head>

    <body>   

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/blogs/welcome">BLOG WORLD</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
<!--                        <li class="home "><a href="/blogs/welcome">Home</a></li>-->
                        <?php
                        if (!$loggedIn) {
                            ?> 
                            <li class="sign_up"><a  href="/users/sign_up">Sign Up</a></li>
                            <li class="login"><a href="/users/login">Sign In</a></li>
                            <?php
                        } else {
                            ?>
                            <li class="my_blogs"><a  href="/blogs">My Blogs</a></li>
                            <li class="sign_up"><a  href="/users/logout">Sign Out</a></li>                            
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <div class="container">
            
            <?= $this->Flash->render(); ?>

            <?= $this->fetch('content'); ?>

            <hr class="colorgraph">
            <div class="footer">
                <p>&copy; Company 2013</p>
            </div>

        </div>
    </body>
</html>
