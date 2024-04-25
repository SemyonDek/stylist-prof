<?php
session_start();

unset($_SESSION['accountName']);
unset($_SESSION['accountId']);

header('Location: ../../');
