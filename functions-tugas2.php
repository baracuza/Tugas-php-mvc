<?php


class Admin {
    public static function login_form() {
        include(__DIR__ . '/../view/admin-panel/admin-login.php');
    }

    public static function login_save() {
        include(__DIR__ . '/../view/admin-panel/admin-dashboard.php');
    }

    public static function dashboard() {
        include __DIR__ . '/../view/admin-panel/admin-dashboard.php';
    }
}

class Customer {
    public static function login_form() {
        include __DIR__ . '/../view/forms/customer-login.php';
    }

    public static function login_save() {
        include __DIR__ . '/../view/shop/home.php';
    }

    public static function register_form() {
        include __DIR__ . '/../view/forms/customer-register.php';
    }

    public static function register_save() {
        include __DIR__ . '/../view/forms/customer-login.php';
    }

    public static function profile() {
        include __DIR__ . '/../view/forms/customer-profile.php';
    }

    public static function profile_edited() {
        include __DIR__ . '/../view/forms/customer-profile.php';
    }
    public static function logout() {
        include __DIR__ . '/../view/forms/customer-login.php';
    }
}

class Home {
    public static function index() {
        include __DIR__ . '/../view/shop/home.php';
    }
}

class Item {
    public static function index() {
        include __DIR__ . '/../view/shop/item.php';
    }

    public static function show($id) {
        include __DIR__ . '/../view/shop/item.php';
    }
}

class Cart {
    public static function index() {
        include __DIR__ . '/../view/shop/cart.php';
    }
}

class Order {
    public static function index() {
        include __DIR__ . '/../view/shop/order.php';
    }

    public static function show($id) {
        include __DIR__ . '/../view/shop/order.php';
    }
}

class Contact {
    public static function index() {
        include __DIR__ . '/../view/shop/contact.php';
    }
}


?>
