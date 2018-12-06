<?php
function showPlatform($platArray){
$platInfo=["ps2"=>1,"ps3"=>2,"ps4"=>4,"psp"=>8,"steam/PC"=>16,"psv"=>32,"3DS"=>64,"switch"=>128,"WiiU"=>256,"Xbox/Xbox360"=>512];
$result=array_intersect($platInfo,$platArray);
return $result;


}

?>
