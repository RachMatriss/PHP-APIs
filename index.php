<?php 
require "vendor/autoload.php";
require "components/Cache.php";
require "components/ApisController.php";

$title = 'APIs Test' ;
?>
<h1><?= $title ; ?></h1>

<?php 

// new apis class 
$api = new ApisController() ; 
 
$data = $api->getData() ; 
/*-------------------------------*/ 
$code =  $data->getStatusCode() ; //  code status
$headers = $data->getHeaders()["Content-Type"][0] ;  //headers
$result = $data->getBody() ;  //Data that needs to be cached
/*--------------------------------*/
?>
<pre>
<?= $code ?> && <?= $headers ?><hr>
<?= $result  ?>
</pre><hr>


<!-------------------- Caches Test  ----------------------->
<h1><?= 'Caches Test' ?></h1>
<?php
$cache = new Cache();
$kye = 'apisdata' ;// play with the kye here 
$duration = 5*60 ; 

if (is_null( $cache->get($kye) ) ) {
       $cache->set($kye ,$result , $duration) ; // cache your new  data 
       echo "<hr>Cache new Data Success with kye => $kye at:" . date ("F d Y H:i:s.", time()) .'<br>' ;
    }


?>

