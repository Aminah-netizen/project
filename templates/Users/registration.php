<?php
echo $this->Html->css('select2/css/select2.css');
echo $this->Html->script('select2/js/select2.full.min.js');
?>

<style>
    .page-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .page-header h1 {
        font-size: 2rem;
        font-weight: bold;
    }

    .page-header h6 {
        font-size: 1rem;
    }

    .card {
        border-radius: 12px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        border: none;
    }

    ul {
        list-style-type: disc;
        padding-left: 20px;
    }

    ul li {
        margin-bottom: 10px;
        font-size: 0.9rem;
    }
</style>

<!-- Header -->
<div class="page-header">
    <h1 class="my-0"><?php echo $title; ?></h1>
    <h6><?php echo $system_name; ?></h6>
</div>
<div class="line mb-4"></div>

<div class="row mt-3">
    <!-- Form Section -->
    <div class="col-md-9">
        <div class="card bg-body-tertiary shadow mb-4">
            <div class="card-body">
                <?= $this->Form->create($user, ['type' => 'file', 'novalidate' => true]); ?>
                <fieldset>
                    <div class="row">
                        <div class="col">
                            <?= $this->Form->control('fullname', ['required' => false, 'class' => 'form-control']); ?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('email', ['required' => false, 'class' => 'form-control']); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <?= $this->Form->control('password', ['required' => false, 'class' => 'form-control']); ?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('cpassword', [
                                'class' => 'form-control',
                                'type' => 'password',
                                'label' => 'Confirm Password',
                                'required' => false
                            ]); ?>
                        </div>
                    </div>

                    <?= $this->Form->control('avatar', [
                        'type' => 'file',
                        'required' => false,
                        'class' => 'form-control',
                        'label' => 'Profile Image'
                    ]); ?>

                    <div class="form-check mt-3">
                        <?= $this->Form->checkbox('terms', [
                            'value' => 'terms',
                            'class' => 'form-check-input shadow',
                            'id' => 'terms'
                        ]); ?>
                        <label for="terms" class="form-check-label">
                            I agree to the registration terms &amp; conditions
                        </label>
                    </div>
                </fieldset>
                <div class="text-end mt-4">
                    <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-warning']); ?>
                    <?= $this->Form->button(__('Submit'), [
                        'type' => 'submit',
                        'disabled' => 'disabled',
                        'class' => 'btn btn-outline-primary'
                    ]); ?>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div class="col-md-3">
        <div class="card bg-body-tertiary shadow mb-4 text-mute">
            <div class="card-body">
                <ul>
                    <li>All information provided during registration is correct.</li>
                    <li>One email can register only one account.</li>
                    <li>Use a strong password to ensure your account is secure.</li>
                    <li>Contact the administrator if unable to register.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(".input select").select2();

        var checkboxes = $("input[type='checkbox']"),
            submitButton = $("button[type='submit']");

        checkboxes.click(function() {
            submitButton.attr("disabled", !checkboxes.is(":checked"));
        });
    });
</script>
