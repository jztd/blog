
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('normalize.css') ?>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('bootstrap-theme.css') ?>
    <?= $this->Html->css('custom.css') ?>
    <?= $this->Html->script('jquery') ?>
    <?= $this->Html->script('bootstrap') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <?= $this->Html->link('DesignMe', '/posts/index', ['class' => 'navbar-brand']) ?>
            </div>
            <p class="navbar-text"> Tomorrows Design, Never </p>
            <ul class="nav navbar-nav">
                <li><?= $this->Html->link("Gallery", ['controller' => 'Posts', 'action' => 'index']); ?></li>
                <?php
                    if($userType == "admin")
                    { ?>
                       <li> <?php echo $this->Html->link("Posts Admin", ['controller' => 'Posts', 'action' => 'manage']); ?> </li>
                       <li> <?php echo $this->Html->link("Users Admin", ['controller' => 'Users', 'action' => 'manage']);?> </li>

                    <?php   
                    }
                    if($userType == "admin" || $userType == "author")
                    { ?>
                        <li> <?php echo $this->Html->link("New Post", ['controller' => 'Posts', 'action' => 'create']);?> </li>
                  <?php  } 
                ?>
            </ul>
            <p class="navbar-text navbar-right"> logged in as <?php ($loggedIn != NULL ? print($loggedIn.' '.$this->Html->link("Logout",['controller' => 'Users', 'action'=>'logout'])) : print('Guest '.$this->Html->link("Login",['controller' => 'Users', 'action'=>'login'])." or ".$this->Html->link("register",['controller' => 'Users', 'action'=>'register']))); ?> </p>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>

        <?= $this->fetch('content') ?>

    <footer>
    </footer>
</body>
</html>
