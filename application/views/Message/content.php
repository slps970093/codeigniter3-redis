<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message Page</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap-4.1.1/bootstrap.min.css') ?>">
    <script type="text/javascript" src="<?=base_url('js/jquery3/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('js/bootstrap-4.1.1/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('js/ckeditor5/ckeditor.js') ?>"></script>
</head>
<body>
<div class="container">
    <div class="col-md"></div>
    <div class="col-md">
        <table class="table">
            <tr>
                <td><?= $result['title'] ?></td>
            </tr>
            <tr>
                <td><?= $result['message'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md"></div>
</div>

</body>
</html>