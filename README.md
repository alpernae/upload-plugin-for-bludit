# bludit-uploud-plugin-fix
This is for huntr security

https://github.com/multicolor-rgb/upload-plugin-for-bludit/blob/766516ee8ceba5d151a0688785fc942c907096dd/uploadPlugin/plugin.php#L73-L85


Add fix code

```
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
```
