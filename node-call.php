<?php
function send_data($host,$port='80',$data='') 
{ 
    $_err = 'lib sockets::'.__FUNCTION__.'(): '; 
    $str = $_POST['name'];
    $fp = fsockopen($host,$port,$errno,$errstr,$timeout=30); 
    if(!$fp)
    {
            die($_err.$errstr.$errno); 
    }
    else 
    {
      
		fputs($fp, $str."\r\n"); 
		
		$d .= fgets($fp,1024); 
		fclose($fp); 
		} 
    return $d; 
} 

if($_POST)
    send_data('127.0.0.1','8199',array('name'=>$_POST['name']));

?>

<form method="post" name="sampleform" action="">
    
    <input type="text" name="name" value="" />
    <input type="submit" />
    
</form>