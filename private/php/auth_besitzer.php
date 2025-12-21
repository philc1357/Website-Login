<?php
session_start();

if (!isset($_SESSION['gruppe_id']) || $_SESSION['gruppe_id'] !== 1) {
    header("Location: ../../index.html");
    exit;
}