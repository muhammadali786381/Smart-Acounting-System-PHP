<?php
$user->insert_user_log($_SESSION['userId'],"logout",get_real_user_ip());   
session_destroy();
RedirectURL(BASE_URL."login");
