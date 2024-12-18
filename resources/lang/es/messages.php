<?php
$result=[];
$files=glob (base_path().'/Modules/*/Lang/*.php');
foreach ($files as $file){
    $lang=require($file);
    $result=array_merge($result,$lang['es']);
}
return array_merge($result);
