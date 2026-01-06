<?php
session_start();

if (!isset($_SESSION['group_id']) || $_SESSION['group_id'] !== 2) {
    header("Location: ../../index.html");
    exit;
}