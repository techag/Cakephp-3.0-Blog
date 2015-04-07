<?php
use Cake\Core\Configure;

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?= Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>

<div class="jumbotron">
    <h1><?= h($message) ?></h1>
    <p class="lead">Seems like the blog you are looking for has not been created yet. <br>
        How about creating new one? It takes one easy step.
    </p>
    <?php if (!$loggedIn) {
        ?> 
        <a class="btn btn-large btn-success" href="/users/sign_up">Sign up today</a>
        <?php
    } else {
        ?>
        <a class="btn btn-large btn-success" href="/blogs/create">Write Your Blog!</a>
        <?php
    }
    ?>
</div>