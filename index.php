<?php
$route = $_GET['route'];

require "templates/header.php";
switch ($route) {
    case '':
        require "templates/main.php";
        break;
    case 'shop':
        require "templates/shop.php";
        break;
    case 'about':
        require "templates/about.php";
        break;
    case 'contacts':
        require "templates/contacts.php";
        break;
}
require "templates/footer.php";