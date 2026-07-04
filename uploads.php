<?php

$folder = "uploads/";

if (!file_exists($folder)) {
    mkdir($folder, 0777, true);
}

// رفع الملف
if (isset($_POST['upload'])) {

    $fileName = basename($_FILES["file"]["name"]);
    $target = $folder . $fileName;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target)) {
        header("Location: index.php");
        exit();
    }
}

// حذف الملف
if (isset($_GET['delete'])) {

    $file = $folder . basename($_GET['delete']);

    if (file_exists($file)) {
        unlink($file);
    }

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Cloud Storage File Manager</title>

<style>

body{
    margin:0;
    font-family:Arial;
    background:#f2f2f2;
}

.container{
    width:700px;
    margin:40px auto;
    background:#fff;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}

h1{
    text-align:center;
    color:#0066cc;
}

form{
    text-align:center;
    margin:20px 0;
}

input[type=file]{
    padding:8px;
}

button{
    padding:10px 20px;
    background:#0066cc;
    color:#fff;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#004a99;
}

table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

th{
    background:#0066cc;
    color:white;
}

a{
    text-decoration:none;
    color:#0066cc;
    font-weight:bold;
}

</style>

</head>
<body>

<div class="container">

<h1>☁ Cloud Storage File Manager</h1>

<form method="post" enctype="multipart/form-data">

<input type="file" name="file" required>

<button type="submit" name="upload">Upload File</button>

</form>

<table>

<tr>
<th>File Name</th>
<th>Download</th>
<th>Delete</th>
</tr>

<?php

$files = scandir($folder);

foreach($files as $file){

    if($file!="." && $file!=".."){

        echo "<tr>";

        echo "<td>$file</td>";

        echo "<td><a href='uploads/$file' download>Download</a></td>";

        echo "<td><a href='?delete=$file'>Delete</a></td>";

        echo "</tr>";
    }
}

?>

</table>

</div>

</body>
</html>
