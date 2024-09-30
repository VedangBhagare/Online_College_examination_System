<html>
    <head>
        <meta charset="utf-8">
        <title>Dislpay pdf</title>
</head>
<body>
    <div class="div1">
        <?php
        include_once 'connection.php';
        $sql="select file from exam_form";
        $query=mysqli_query($conn,$sql);
        while($info=mysqli_fetch_array($query)){
            ?>
            <embed type="application/pdf" src="upload_pdf/<?php echo $info['file'];?>" width="400" height="500">
            <?php
        }
        ?>


    </div>
</body>
</head>