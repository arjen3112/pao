<?php

function bootstrap($dir)
{

//////  bootstrap met scandir-functie  ///////
	$files = scandir($dir);
	foreach($files as $file)
		{
			if ($file != '.' && $file != '..' && $file != 'bootstrap.php')
			{
				if(is_dir($file))
				{
					bootstrap($dir.DIRECTORY_SEPARATOR.$file);
				}
				elseif('.php' === substr($file, strlen($file) - 4))
				{
					include($dir.DIRECTORY_SEPARATOR.$file);
				}
			}
		}
		
/*
//////  bootstrap met glob-functie  ///////
	foreach (glob($dir.'/'."*.php") as $filename)
	{
		if(!is_dir($filename)) // skip folder die .php heet
		{
			if($filename != $dir.'/'."bootstrap.php")
			include($filename);
		}
	}
*/

	
/*
//////  bootstrap met opendir-functie  ///////
	  $dh = @opendir($dir); // access private
	  
	  if (!$dh)
	     {
	     throw new exception("cannot open directory :".$dir);
	     }
	  else
	    {
	    while (($file = readdir($dh)) !== false)
	      {
	        if ($file != '.' && $file != '..')
	          {
	            $requiredFile = $dir . DIRECTORY_SEPARATOR . $file;
	            //   === en !== doet ook aan TYPE-convention checking.
	            if ('.php' === substr($file, strlen($file) - 4))
	             {
	               require_once $requiredFile;
	              }
	            elseif (is_dir($requiredFile))
	              {
	               getBootstrap($requiredFile);
	              }
	          }
	      }
	closedir($dh);
	}
	unset($dh, $dir, $file, $requiredFile);
*/
}
?>