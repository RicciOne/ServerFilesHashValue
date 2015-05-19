<?php
// RUN "$ php /pathtofile/fileChecker.php sampledirectory/" in bash
function search($parameter)
{
	if(is_dir($parameter))
	{
		$files = scandir($parameter);
		foreach ($files as $key => $value) {
			if(is_file($parameter.$files[$key])){ 
				print $parameter.$files[$key]."\t".hash_file('sha256',$parameter.$files[$key])."\n";
			}
			else{
				if($files[$key] != '.' && $files[$key] != '..'){search($parameter.$files[$key].DIRECTORY_SEPARATOR);}
			}
		}
	}
}
search($argv[1]);
?>