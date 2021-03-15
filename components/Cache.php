<?php 


require "vendor/autoload.php";
include('CacheInterface.php');

class CacheController 
{
    private $cache;

    public function __construct(CacheInterface $cache) {
        $this->cache = $cache;
    }
}

class Cache implements CacheInterface 
{   /*
    ** cache class 
    **  
    */
    public  $duration = 5*60 ;

    public function set(string $key, $value, int $duration) 
    {   $this->duration = $duration;
        $filename = $key  ;// you can make this md5 hash to head your data 
        file_put_contents('cachedata/'.$filename, $value);
    }

    public function get(string $key) 
    {      //if file exists, return the file
       if ( file_exists('cachedata/'.$key) ) {
            $timestamp = filemtime('cachedata/'.$key) + $this->duration  ;
             echo "data exist on file $key last modified: ". date ("F d Y H:i:s.", filemtime('cachedata/'.$key) ); 
                if ($timestamp > time() ) {
                        $fileContents = file_get_contents('cachedata/'.$key);
                        $output = @serialize($fileContents );               
                    var_dump($output) ;
                    return $output;
                }else{
                    echo ' <br>but this cache expired !duration is big then: '.$this->duration.'s';
                    return null ;
                }
            } else {  //else return null
             echo 'cache expired !';
            return null;
        }
    }

}

?>
