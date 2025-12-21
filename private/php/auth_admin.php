<?php
session_start();

if (!isset($_SESSION['gruppe_id']) || $_SESSION['gruppe_id'] !== 2) {
    header("Location: ../../index.html");
    exit;
}