<?php
# This's from: https://www.w3resource.com/php-exercises

// #Write a PHP script to get the PHP version and configuration information.
// phpinfo();

/*
# Write a PHP script to display the following strings.
Sample String :
'Tomorrow I \'ll learn PHP global variables.'
'This is a bad command : del c:\\*.*'
Expected Output :
Tomorrow I 'll learn PHP global variables.
This is a bad command : del c:\*.*
*/

// echo "Tomorrow I \'ll learn PHP global variables.\n";
// echo "This is a bad command : del c:\\*.*\n";

// #Write a PHP script to get the current file name.
/*
// Get the full path and filename
$fullPath = __FILE__;

// Get just the filename
$fileName = basename(__FILE__);

echo "Full path: " . $fullPath . "\n";
echo "Filename: " . $fileName . "\n";
*/

// #Write a PHP script, which will return the following
// #components of the url 'https://www.w3resource.com/php-exercises/php-basic-exercises.php'.

// Define the URL to be parsed
$url = 'https://www.w3resource.com/php-exercises/php-basic-exercises.php';

// Parse the URL and store its components in the $url variable
$url = parse_url(url: $url);

// Display the scheme (protocol) of the parsed URL
echo 'Scheme : ' . $url['scheme'] . "\n";

// Display the host (domain) of the parsed URL
echo 'Host : ' . $url['host'] . "\n";

// Display the path of the parsed URL
echo 'Path : ' . $url['path'] . "\n";
?>
