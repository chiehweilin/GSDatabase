<?php
 session_start(); 
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'Linda' && 
                  $_POST['password'] == '1234') {
                  header('Location: http://mylinux.langara.bc.ca/~clin31/Webpage/user/');
               }else {
                  $msg = 'Wrong username or password';
               }
            }
?>
