
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
</head>
<body>
    <h1>Records</h1>

    
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Number 1</th>
                <th>Number 2</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calculations as $calculation) : ?>
                <tr>
                    <td><?= $calculation['username'] ?></td>
                    <td><?= $calculation['number1'] ?></td>
                    <td><?= $calculation['number2'] ?></td>
                    <td><?= $calculation['result'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="<?= base_url() ?>"><button>Back to Calculator</button></a>
</body>
</html>
