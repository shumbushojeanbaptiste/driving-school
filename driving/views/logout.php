<?php

session_unset();
session_destroy();
?>

    <script>
        // Redirect to sign-in after 3 seconds
        setTimeout(function () {
            window.location.href = "../public/sign-in";
        }, 3000);
    </script>
    <style>
        body {
            
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .goodbye-box {
            background: #ffffff;
            padding: 40px 60px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        .goodbye-box h1 {
            color: #333;
            margin-bottom: 10px;
        }

        .goodbye-box p {
            color: #666;
            font-size: 16px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

<body>
    <div class="goodbye-box">
        <h1>You've been logged out</h1>
        <p>Have a nice day! wait a moment...</p>
    </div>
</body>

