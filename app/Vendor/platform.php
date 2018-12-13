<?php
function showPlatform($platArray){
$platInfo=["ps2"=>1,"ps3"=>2,"ps4"=>4,"psp"=>8,"steam"=>16,"psv"=>32,"3DS"=>64,"switch"=>128,"WiiU"=>256,"Xbox1/Xbox360"=>512,"PC"=>1024];
$result=array_intersect($platInfo,$platArray);
return $result;


}

?>
