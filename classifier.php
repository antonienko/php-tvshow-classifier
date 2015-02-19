<?php
if (!isset($argv[1])) {
	echo "Ussage: php classifier.php [folder-name]\n";
	die();
}
$folder = rtrim($argv[1],'/');
$dir = opendir($folder);
$pattern = '/(.*)S[0-9]{1,2}E[0-9]{1,2}.*/i';
while (false !== ($file = readdir($dir))) {
        preg_match($pattern, $file, $match);
        if (count($match)) {
                $show_name = trim(str_replace('.', ' ', $match[1]));
                if(!file_exists("$folder/$show_name")){
                        mkdir("$folder/$show_name", 0777, true);
                }
                rename("$folder/$file", "$folder/$show_name/$file");
        }
}
