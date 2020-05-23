<?php


include 'connection/conn.php';
include 'connection/session.php';

session_destroy();

header('Location: index.php?logout=1');

