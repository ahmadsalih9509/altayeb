# altayeb<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Storage File Manager</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h1>☁ Cloud Storage File Manager</h1>

    <form action="upload.php" method="POST" enctype="multipart/form-data">

        <input type="file" name="file" required>

        <button type="submit" name="upload">
            Upload File
        </button>

    </form>

    <hr>

    <h2>Uploaded Files</h2>

    <?php

    $folder = "uploads/";

    if(is_dir($folder)){

        $files = scandir($folder);

        foreach($files as $file){

            if($file != "." && $file != ".."){

                echo "<p>
                $file

                <a href='uploads/$file' download>Download</a>

                <a href='delete.php?file=$file'>Delete</a>

                </p>";

            }

        }

    }

    ?>

</div>

</body>
</html>
