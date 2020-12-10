<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendrier CakePHP</title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css([
        '/libraries/fullcalendar5.4.0/lib/main.css',
        '/libraries/bootstrap4.5.3/css/bootstrap.min.css',
        '/libraries/bootstrap4.5.3/css/bootstrap-grid.min.css',
        '/libraries/bootstrap4.5.3/css/bootstrap-reboot.min.css',
        '/css/main.css'
    ]) ?>
    <?= $this->Html->script([
        '/libraries/jquery3.5.1/jquery.js',
        '/libraries/fullcalendar5.4.0/lib/main.js',
        '/libraries/bootstrap4.5.3/js/bootstrap.min.js',
        '/libraries/bootstrap4.5.3/js/bootstrap.bundle.min.js',
        '/libraries/fontawesome5.15.1/js/all.min.js'
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</body>
</html>
