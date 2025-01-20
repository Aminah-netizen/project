<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recipe Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* General styles */
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 20px;
            color: #000;
        }

        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #e74c3c;
            color: white;
            margin-bottom: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .header .logo {
            font-size: 2.5rem;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .image-section {
            margin: 30px auto;
            text-align: center;
            padding: 20px;
        }

        .image-section h2 {
            font-size: 2rem;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        .image-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .image-grid img {
            width: 300px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .recipe-container {
            page-break-after: always;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .recipe-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: rgb(173, 17, 0);
            margin-bottom: 10px;
        }

        .section-title {
            font-size: 1.5rem;
            margin: 20px 0 10px;
            color: #2c3e50;
            text-transform: uppercase;
            border-bottom: 2px solid #e74c3c;
            padding-bottom: 5px;
        }

        .blockquote {
            background: #f9f9f9;
            padding: 15px 20px;
            border-radius: 8px;
            margin: 10px 0;
            border-left: 4px solid #e74c3c;
            font-style: italic;
        }

        .page-break {
            page-break-after: always;
        }

        .footer {
            text-align: center;
            font-size: 0.9rem;
            margin-top: 30px;
            color: #7f8c8d;
        }
        .footer i{
            color: #7f8c8d;
        }
    
    </style>
</head>
<body>

<!-- Header Section -->
<header class="header">
    <div class="logo">STOVE</div>
</header>

<!-- Title Section -->
<h1 style="text-align: center; color: #e74c3c;">Recipe Book</h1>

<!-- Image Section -->
<section class="image-section">
    <h2>Cook With Passion, Design With Flavor</h2>
    <div class="col-md-4 mb-3">
    <img src="<?= $this->Url->build('/img/front/back.jpg', ['fullBase' => true]) ?>" class="center-image" style="width: 100%; height: 100%; object-fit: cover;">
				</div>
    </div>
</section>

<div class="page-break"></div>


<?php if (isset($recipe)): ?>
    <div class="recipe-container">
        <div class="recipe-title">
            <?= h($recipe->name) ?> by <?= h($recipe->user->fullname) ?>
        </div>

        <!-- Top Images -->
        <?php
            $photoPath = !empty($recipe->photo) 
                ? WWW_ROOT . 'files' . DS . 'Recipes' . DS . 'photo' . DS . h($recipe->photo) 
                : WWW_ROOT . 'img' . DS . 'blank_profile.png';

            if (file_exists($photoPath)) {
                echo '<img src="' . $photoPath . '" alt="Recipe Photo" style="width: 150px; height: 150px;">';
            } else {
                echo '<p>Image not found.</p>';
            }
        ?>

        <!-- Ingredients Section -->
        <div class="section-title">INGREDIENTS</div>
        <blockquote class="blockquote">
            <pre><?= h($this->CustomHtml->convertHtmlToPlainText($recipe->ingredient)); ?></pre>
        </blockquote>

        <!-- Steps Section -->
        <div class="section-title">STEPS</div>
        <blockquote class="blockquote">
            <pre><?= h($this->CustomHtml->convertHtmlToPlainText($recipe->step)); ?></pre>
        </blockquote>
    </div>
<?php else: ?>
    <p>No recipe found.</p>
<?php endif; ?>

<!-- Footer Section -->
<div class="footer">
    <p>© <?= date('Y') ?> <i class="fa-solid fa-fire"></i> Stove Community. All rights reserved.</p>
</div>

</body>
</html>
