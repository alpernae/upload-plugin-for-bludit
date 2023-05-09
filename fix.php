$allowed_extensions = array('jpg', 'png', 'gif');  
// allowed extensions also you can allow .html etc ...
$zip = new ZipArchive();
$x = $zip->open($targetzip);  // open the zip file to extract
if ($x === true) {
    for ($i = 0; $i < $zip->numFiles; $i++) {
        $filename = $zip->getNameIndex($i);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array($extension, $allowed_extensions)) {
            $zip->extractTo($path, array($filename)); 
        }
    }
    $zip->close();
    unlink($targetzip);
}
