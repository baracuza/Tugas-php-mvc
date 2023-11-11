<?php
require_once ('functions.php');

$url = $_GET['url'] ?? '../index.php';
$url = parse_url($url, PHP_URL_PATH);
$pathParts = explode('/', $url);
$url = end($pathParts);


switch ($url) {
    case 'admin':
        $action = $_GET['loggedIn'] ?? '';
        if($action === 'true'){
            Admin::dashboard();
        }  
        else{
            Admin::login_form();    
        }
        break;
    case 'dashboard':
        Admin::dashboard();
        break;
    case 'login':
        $action = $_GET['status'] ?? '';
        if($action === 'true'){
            Customer::login_save();
        }  
        else{
            Customer::login_form();
        }
        break;
    case 'register':
        $action = $_GET['action'] ?? '';
        if($action === 'save'){
            Customer::register_save();
        }  
        else{
            Customer::register_form();
        }
        break;
    case 'profile':
        $action = $_GET['action'] ?? '';
        if($action === 'edited'){
            Customer::profile();
        }  
        else{
            Customer::profile_edited();
        }
        break;
    case 'item':
        $id = $_GET['id'] ?? 0;
        Item::show($id);
        break;
    case 'cart':
        $id = $_GET['id'] ?? 0;
        Cart::index($id);
        break;
    case 'order':
        $id = $_GET['id'] ?? 0;
        Order::show($id);  
        break;
    case 'contact':
        Contact::index();
        break;
    case 'logout':
        Customer::logout();
        break;
    default:
        Home::index();
}
