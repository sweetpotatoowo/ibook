<?php
$fileName = $_FILES["file1"]["name"];  //the file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"];  //file in the php tmp folder
$fileType = $_FILES["file1"]["type"];   // the type of file it is
$fileSize = $_FILES["file1"]["size"];  //file size in bytes
$fileErrorMsg = $_FILES["file1"]["error"];  //o for false... and 1 for true

if (!$fileTmpLoc) {
    // if file not chosen
    $retcode = array('success' => 'false', 'msg' => '', 'error' => '上傳暫存檔無法建立!', 'fileName' => '');
    echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
    exit();
}

if (move_uploaded_file($fileTmpLoc, "uploads/$fileName")) {
    // file to uploads folder
    $retcode = array('success' => 'true', 'msg' => '完成檔案上傳', 'error' => '', 'fileName' => $fileName);
} else {
    $retcode = array('success' => 'false', 'msg' => '', 'error' => '無法完成檔案上傳', 'fileName' => '');
}
echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
exit();
