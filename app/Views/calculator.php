<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="app/Assets/script.js"></script>
    <title>Calculator</title>
</head>
<body>
    <h1>Calculator</h1>
    <form action="<?= base_url('calculate') ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="number1">Number 1:</label>
        <input type="number" name="number1" id="number1" required><br><br>
        <label for="number2">Number 2:</label>
        <input type="number" name="number2" id="number2" required><br><br>
        <button type="submit">Calculate</button>
    </form>
    
    <?php if (session()->has('error')) : ?>
    <p><?= session('error') ?></p>
<?php endif; ?>

     
     <h2>Previous Calculations</h2>
    <?php if (!empty($previousCalculations)) : ?>
        <ul>
            <?php foreach ($previousCalculations as $calculation) : ?>
                <li>
                    <?= $calculation['username'] ?> | <?= $calculation['number1'] ?> + <?= $calculation['number2'] ?> = <?= $calculation['result'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No previous calculations.</p>
    <?php endif; ?>


    <div id="data-container"></div>
    <a href="<?= base_url('records') ?>"><button>Show Records</button></a>
</body>
</html>
