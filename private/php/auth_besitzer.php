<?php
session_start();

if (!isset($_SESSION['group_id']) || $_SESSION['group_id'] !== 1) {
    header("Location: ../../index.html");
    exit;
}