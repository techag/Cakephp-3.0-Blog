<script type="text/javascript">
    $(document).ready(function() {
        $('.home').addClass("sign_up active");
    });
</script>
<!-- /container -->
<div class="jumbotron">
    <h1>Welcome to Blog World!</h1>
    <p class="lead">A blog is your personal space to put your thoughts on web and share them with world. A place where your thoughts can become an inspiration or solution to someone. If have passion of writing and you think you can contribute to some topic which many need you expertise then let me tell you my friend you are at right place.
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
<hr class="colorgraph">
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Latest Blogs
        </h3>
    </div>
    <?php foreach ($blogs as $blog): ?>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-fw fa-check"></i> <?= $blog->title; ?></h4>
                    <p>By <a href="javascriptVoid(0)"> <?= $blog->user->first_name . ' ' . $blog->user->last_name; ?> </a></p>
                </div>
                <div class="panel-body">
                    <p><?= $blog->description; ?></p>
                    <a href="/blogs/view/<?= $blog->id; ?>" class="btn btn-default">Read More</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>    
</div>
<div class="row text-center">
    <ul class="pagination">
        <?php
        echo $this->Paginator->prev('<span class="glyphicon glyphicon-chevron-left"></span>');
        echo $this->Paginator->numbers();
        echo $this->Paginator->next('<span class="glyphicon glyphicon-chevron-right">');
        ?>
    </ul>
</div>

