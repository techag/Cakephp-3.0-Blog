<script type="text/javascript">
    $(document).ready(function() {
        $("#agree").click(function() {
            $(this).toggleClass("active");
        });
        
        $('.sign_up').addClass("sign_up active");
        
    });
</script>
<div class="container-narrow">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<?php echo $this->Form->create('SignUp', array('inputDefaults' => array('label' => false)));?>
            <h2>Please Sign Up <br> <small>It's free and always will be.</small></h2>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <?php echo $this->Form->input('first_name',array('label' => false,'class'=>'form-control input-lg','placeholder' => 'First Name','tabindex'=>'1','required'=>true)); ?>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <?php echo $this->Form->input('last_name',array('label' => false,'class'=>'form-control input-lg','placeholder' => 'Last Name','tabindex'=>'2','required'=>true)); ?>                        
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('display_name',array('label' => false,'class'=>'form-control input-lg','placeholder' => 'Display Name','tabindex'=>'3','required'=>true)); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('email',array('type' => 'email','label' => false,'class'=>'form-control input-lg','placeholder' => 'Email Address','tabindex'=>'4','required'=>true)); ?>                
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('contact_no',array('label' => false,'class'=>'form-control input-lg','placeholder' => 'Contact Number','tabindex'=>'4','required'=>true)); ?>                
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <?php echo $this->Form->input('password',array('type' => 'password','label' => false,'class'=>'form-control input-lg','placeholder' => 'Password','tabindex'=>'5','required'=>true)); ?>  

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <?php echo $this->Form->input('password_confirm',array('type' => 'password','label' => false,'class'=>'form-control input-lg','placeholder' => 'Confirm Password','tabindex'=>'6','required'=>true)); ?> 

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-3 col-md-3">
                    <span class="button-checkbox">
                        <button type="button" class="btn btn-default" data-color="info" tabindex="7" id="agree"><i class="state-icon glyphicon glyphicon-unchecked"></i>I Agree</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
                    </span>
                </div>
                <div class="col-xs-8 col-sm-9 col-md-9">
                    You agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
                </div>
            </div>

            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-md-6">                    
                    <?php echo $this->Form->submit('Register', array('class' => 'btn btn-primary btn-block btn-lg','tabindex'=>'7')); ?>
                </div>
                <div class="col-xs-12 col-md-6"><a href="/users/login" class="btn btn-success btn-block btn-lg">Sign In</a></div>
            </div>
        <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>