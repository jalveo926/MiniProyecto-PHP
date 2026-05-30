<!DOCTYPE html>
<html>
<head>
    <title>Problema 2 - Suma 1..1000</title>
</head>
<body>
    <h2>Problema 2: Suma de los números del 1 al 1,000</h2>
    <p>El resultado es: <strong><?= number_format($total, 0) ?></strong></p>
    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>
    <?php include 'footer.php'; ?>
</body>
</html>