<?php echo $this->Html->css('animate.min'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Morphext/2.4.4/morphext.css" integrity="sha256-iwSnUqgAndMlZnwFWAAzto9R/6Un2RBguZEITMb0Olk=" crossorigin="anonymous" />
<style>
    .page-container {
        max-width: 400px;
        margin: auto;
        animation: fadeInUp 1s;
    }

    .stove-logo {
        font-size: 3rem;
        font-weight: bold;
        color: red;
        margin-bottom: 1rem;
        animation: pulse 1.5s infinite;
    }

    .stove-logo:hover {
        animation: tada 1s;
    }

	.stove-logo i{
        font-size: 2.5rem;
        font-weight: bold;
        color: red;
        margin-bottom: 1rem;
        animation: pulse 1.5s infinite;
    }

    .card {
        border-radius: 12px;
        overflow: hidden;
        border: 0;
    }

    .form-control {
        border-radius: 8px;
    }

    .text-center a {
        text-decoration: none;
        color: red;
        font-weight: bold;
        transition: color 0.2s;
    }

    .text-center a:hover {
        color: #cc0000;
    }
</style>

<div class="page-container">
    <div class="text-center">
        <div class="stove-logo"><i class="fa-solid fa-fire-flame-curved"></i>STOVE</div>
    </div>
    <div class="card bg-body-tertiary shadow mb-4">
        <div class="card-body">
            <div class="text-center my-4">
                <h1 class="my-0 page_title">LOGIN</h1>
            </div>
            <div class="line mb-4"></div>
            <?= $this->Form->create() ?>
                <div class="mb-3">
                    <?= $this->Form->control('email', [
                        'required' => true,
                        'class' => 'form-control border-1',
                        'autocomplete' => 'off',
                        'placeholder' => 'Enter your Email'
                    ]) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('password', [
                        'required' => true,
                        'class' => 'form-control border-1',
                        'placeholder' => 'Enter your Password'
                    ]) ?>
                </div>
                <div class="text-sm-end">
                    <?php echo $this->Html->link('Forgot Password?', ['controller' => 'Users', 'action' => 'forgot_password']); ?>
                </div>
                <div class="d-grid gap-2 text-center">
                    <?= $this->Form->button(__('Log In'), ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']) ?>
                    <?= $this->Form->end() ?>
                </div>
                <div class="text-center mt-4">
                    <p>Don't have an account? <?= $this->Html->link('Register Here', ['controller' => 'Users', 'action' => 'registration']); ?></p>
                </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Morphext/2.4.4/morphext.min.js" integrity="sha256-qG3zvg7/f5CZHwV8IeaQfBY5Hm+M0KR3PMk9lAHp39s=" crossorigin="anonymous"></script>
<script>
    $("#js-rotating").Morphext({
        animation: "fadeInDown",
        complete: function() {
            console.log("This is called after a phrase is animated in! Current phrase index: " + this.index);
        }
    });
</script>
