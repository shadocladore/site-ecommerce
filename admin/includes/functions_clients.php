<?php
function move_avatar($avatar)
{
$extension_upload = strtolower(substr( strrchr($avatar['name'],'.') ,1));
$name = time();
$nomavatar = str_replace(' ','',$name).".".$extension_upload;
$name = "../images/clients/".str_replace('','',$name).".".$extension_upload;
move_uploaded_file($avatar['tmp_name'],$name);
return $nomavatar;
}
?>