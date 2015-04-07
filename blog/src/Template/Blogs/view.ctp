<script type="text/javascript">
    counter = function() {
        var max = 400;
        var total = '';
        var count = $("#comment").val().length;
        total = max - count;
        if (total >= 0) {
            $('#totalChars').text(total);
        } else {
            $("#comment").val($("#comment").val().substring(0, max));
            alert('Comment should have max 400 charecters.');
        }
    }
    $(document).ready(function() {
        $('#comment').click(counter);
        $('#comment').change(counter);
        $('#comment').keydown(counter);
        $('#comment').keypress(counter);
        $('#comment').keyup(counter);
        $('#comment').focus(counter);

    });
</script>
<div class="row">
    <div class="container-narrow">

        <!-- Blog Post -->

        <!-- Title -->
        <h1><?= $blog->title; ?></h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#"><?= $blog->user->first_name . ' ' . $blog->user->last_name; ?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?= date('F j, Y \a\t h:i A', strtotime($blog->created)) ?></p>

        <hr class="colorgraph">

        <!-- Post Content -->
        <p class="lead"><?= $blog->description ?></p>
        <p><?= $content['content']; ?></p>

        <hr class="colorgraph">
        <!-- Blog Comments -->        



    </div>
    <div class="container-narrow">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-12 ">
                <?php echo $this->Form->create('comment', ['url' => ['controller' => 'Comments', 'action' => 'add', $this->request->params['pass'][0]]]); ?>
                <h2>Leave your comment <br></h2>                
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->input('first_name', array('label' => false, 'class' => 'form-control input-lg', 'placeholder' => 'First Name', 'tabindex' => '1', 'required' => true)); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->input('last_name', array('label' => false, 'class' => 'form-control input-lg', 'placeholder' => 'Last Name', 'tabindex' => '2', 'required' => true)); ?>                        
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->input('display_name', array('label' => false, 'class' => 'form-control input-lg', 'placeholder' => 'Display Name', 'tabindex' => '3', 'required' => true)); ?>                        
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('email', array('type' => 'email', 'label' => false, 'class' => 'form-control input-lg', 'placeholder' => 'Email Address', 'tabindex' => '4', 'required' => true)); ?>                
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('contact_no', array('label' => false, 'class' => 'form-control input-lg', 'placeholder' => 'Contact Number', 'tabindex' => '4')); ?>                
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <textarea name="comment" id="comment" class="form-control input-lg" placeholder="Your comment"></textarea>
                </div> 
                <div class="form-group charCount">
                    Characters Remaining <span id="totalChars">400</span>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">                 
                        <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-primary btn-lg', 'tabindex' => '7')); ?>
                    </div>                   
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
            <div class="clearfix"></div>
            <hr>
            
            <?php foreach ($blog->comments as $comment): ?>
            <div class="media">   
                <a class="pull-left" href="#">
                        <img class="media-object" src="/img/user-comment.png" alt="">
                    </a>
                <div class="media-body">
                    <h4 class="media-heading"><?= $comment->display_name; ?>
                        <small><?= date('F j, Y \a\t h:i A', strtotime($comment->created)) ?></small>
                    </h4>
                    <?= $comment->comment; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>