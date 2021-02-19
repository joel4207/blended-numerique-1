<?php
print("GET:");
print_r($_GET);
print("<br />");

print("POST:");
print_r($_POST);
print("<br />");

if ( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false ) {
    print("Ton email est tout pété" );
} else {
    print( "email OK");
}

/*
filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)

*/

?>
