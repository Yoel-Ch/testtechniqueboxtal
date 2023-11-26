<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;subset=latin-ext" rel="stylesheet">

    <link rel="stylesheet" href="../../../css/style.css">
</head>
<body>
<?php include '_partials/header.php'; ?>

<div id="main-content">
    <?php include $content; ?>
</div>

<?php include '_partials/footer.php'; ?>
</body>
</html>