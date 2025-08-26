<?php

session_unset();
session_destroy();
?>

    <script>
        // Redirect to sign-in after 3 seconds
        setTimeout(function () {
            window.location.href = "../rw/sign-in";
        }, 3000);
    </script>
  

