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
</head>
<body>
<div class="container">
    <div class="col-md"></div>
    <div class="col-md">
        <button type="button" class="btn btn-default" onclick="window.location = '<?= site_url('message/append')?>'">新增</button>
        <table class="table">
            <thead>
                <tr>
                    <td>primary Key</td>
                    <td>標題</td>
                    <td>建立時間</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['create_time'] ?></td>
                    <td>
                        <button type="button" onclick="window.location = '<?= site_url("message/content")."/".$row['id'] ?>'" class="btn btn-default">檢視資料</button>
                        <button type="button" onclick="window.location = '<?= site_url("message/update")."/".$row['id'] ?>'" class="btn btn-default">更新</button>
                        <button type="button" onclick="window.location = '<?= site_url("message/delete")."/".$row['id'] ?>'" class="btn btn-danger">刪除</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-md"></div>
</div>

</body>
</html>