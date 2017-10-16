<!DOCTYPE HTML>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Web Crawler</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>

<div class="row">
    <div class="col-xs-12 col-md-12">&nbsp;</div>
</div>

<div class="row">
    <div class="col-xs-6 col-md-1"></div>
    <div class="col-xs-6 col-md-10"><div class="bs-example" data-example-id="simple-table">
            <table class="table">
                <caption style="margin-bottom: 20px;">
                    <h2>HackNews</h2>
                    powered <strong>news.ycombinator.com</strong>
                </caption>

                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Points</th>
                    <th>Comments</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($news as $order => $new) { ?>
                    <tr>
                        <td><?= ++$order ?></td>
                        <td><?= $new['title'] ?></td>
                        <td><?= $new['score'] ?></td>
                        <td><?= $new['descendants'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div></div>
    <div class="col-xs-6 col-md-1"></div>
</div>

</body>

</html>