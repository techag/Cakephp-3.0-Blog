<script type="text/javascript">
    $(document).ready(function() {
        $("#remember").click(function() {
            $(this).toggleClass("active");            
        });
        $('.login').addClass("sign_up active");
    });
</script>
<div class="container-narrow">
    <div class="row" style="margin-top:20px">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <?php echo $this->Form->create('login', array('inputDefaults' => array('label' => false)));?>
                <fieldset>
                    <h2>Please Sign In</h2>
                    <hr class="colorgraph">
                    <div class="form-group">
                        
                        <?php echo $this->Form->input('email',array('type' => 'email','label' => false,'class'=>'form-control input-lg','placeholder' => 'Email Address','tabindex'=>'4','required'=>true)); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('password',array('type' => 'password','label' => false,'class'=>'form-control input-lg','placeholder' => 'Password','tabindex'=>'5','required'=>true)); ?>  
                    </div>
                    <span class="button-checkbox">
                        <button type="button" class="btn btn-info" data-color="info" id="remember"><i class="state-icon glyphicon glyphicon-check"></i>&nbsp;Remember Me</button>
                        <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
                        <a href="" class="btn btn-link pull-right">Forgot Password?</a>
                    </span>
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                             <?php echo $this->Form->submit('Sign In', array('class' => 'btn btn-primary btn-block btn-lg','tabindex'=>'7')); ?>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <a href="/users/sign_up" class="btn btn-success btn-block btn-lg">Register</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>