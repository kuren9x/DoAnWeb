<?php
setcookie('is_login_admin', true, time() - 3600);
setcookie('admin_login', $username, time() - 3600);
unset($_SESSION['is_login_admin']);
unset($_SESSION['admin_login']);
redirect_to('?mod=login');