<?php

session_start();
/* Deleta a sessão */
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email']);

$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: login.php");
