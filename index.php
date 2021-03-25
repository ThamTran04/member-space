<?php
session_start();
require_once 'includes/functions.php';
require_once 'config/database.php';

$errors = []; // initialisation du tableau contenant les erreurs du formulaire

if (!empty($_GET['page']) && is_file('controlers/' . $_GET['page'] . '.php'))
//! le mot 'page' duoc sd o day (lan dau tien duoc dinh nghia o day: sd bat ki tu nao ma coder muon). Tuy nhien, sau day, de goi duoc controleur thi can sd dung chinh xac tu nay. vd: http://localhost/espace-membre/?page=register. Neu sd tu khac (http://localhost/espace-membre/?autre=register) thi site app se xem nhu là trang nay k ton tai va tra ve loi 404
//? model: http://localhost/espace-membre/?page= ten cua controleur (ten file thoi, k can .php)
{


  require_once 'controlers/' . $_GET['page'] . '.php';
} else {


  require_once 'controlers/accueil.php';
}
