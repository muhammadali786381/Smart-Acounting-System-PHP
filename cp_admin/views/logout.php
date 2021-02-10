<?php
$user->insert_admin_log($_SESSION['adminId'],"logout",get_real_user_ip());   
session_destroy();
RedirectURL(BASE_URL.ADMIN_DIR."/login");
