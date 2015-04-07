<script type="text/javascript">
    CKEDITOR.disableAutoInline = true;
    counter = function() {
        var max = 400;
        var total = '';
        var count = $("#description").val().length;
        total = max - count;
        if (total >= 0) {
            $('#totalChars').text(total);
        } else {
            $("#description").val($("#description").val().substring(0, max));
            alert('Content should have max 400 charecters.');
        }
    }


    $(document).ready(function() {
        CKEDITOR.replace('content');
        $('#other_topic').hide();
        $('#description').click(counter);
        $('#description').change(counter);
        $('#description').keydown(counter);
        $('#description').keypress(counter);
        $('#description').keyup(counter);
        $('#description').focus(counter);

        $("#agree").click(function() {
            $(this).toggleClass("active");
        });
    });

</script>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-7 col-sm-offset-2 col-md-offset-2">
        <?php echo $this->Form->create($blog, array('inputDefaults' => array('label' => false))); ?>
        <h2>Write your blog here!</h2>
        <hr class="colorgraph">            
        <div class="form-group">
            <?php echo $this->Form->input('title', array('label' => false, 'class' => 'form-control input-lg', 'placeholder' => 'Title of Blog', 'required' => true, 'value' => $blog->title)); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('description', array('type' => 'textarea', 'label' => false, 'rows' => '2', 'class' => 'form-control input-lg', 'placeholder' => 'Short Description', 'required' => true)); ?>                
        </div>
        <div class="form-group">
            Characters Remaining <span id="totalChars"><b>250</b></span>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->select('topic_id', $topics, array('id' => 'topic_id', 'label' => false, 'class' => 'form-control input-lg', 'required' => true)); ?>                
                </div>
            </div>
        </div>
        <div class="form-group">
            <textarea name="content" id="content"><?= ((isset($content['content']) && $content != '')) ? $content['content'] : '' ?></textarea>
        </div>        

        <div class="row">
            <div class="col-xs-4 col-sm-3 col-md-3">
                <span class="button-checkbox">
                    <button type="button" class="btn btn-default" data-color="info" tabindex="7" id="agree"><i class="state-icon glyphicon glyphicon-unchecked"></i> Enable Comments</button>
                    <?php echo $this->Form->input('active_comments', array('id' => 'active_comments', 'label' => false, 'class' => 'hidden', 'checked' => ($blog->active_comments) == 1 ? 'checked' : '')); ?> 
                </span>
            </div>           
        </div>
        <!--        <hr class="colorgraph">-->
        <div class="row">
            <div class="col-xs-12 col-md-4">                    
                <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-primary btn-block btn-lg')); ?>
            </div>
            <div class="col-xs-12 col-md-4"><a href="/blogs" class="btn btn-success btn-block btn-lg">Cancel</a></div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>