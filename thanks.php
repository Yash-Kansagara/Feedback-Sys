<html>
    <head>
        <title><?php echo $_GET["name"]; ?></title>
        <style>
            body{
                margin: auto 0px;
                background: #666666;
            }
            #msg{
                color: #ffffff;
                margin: 200px auto;
                text-align: center;
                text-shadow: 2px 2px 5px #0000ff;
                font-size: 60px;
                background: activeborder;
            }
        </style>
    </head>
    <body>
        <div id="msg">
            <?php
                echo 'Thanks ' . $_GET["name"] . ', <br>we appreciate your effort for giving us your valuable feedback.';
            ?>
        </div>
    </body>
</html>