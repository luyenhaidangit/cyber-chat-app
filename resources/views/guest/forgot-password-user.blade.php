<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        /* CSS cho phần tử body */
        body {
            background-color: #f6f6f6;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* CSS cho container chính */
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        /* CSS cho phần tử nút */
        .btn {
            display: inline-block;
            font-weight: 600;
            text-decoration: none;
            border-radius: 3px;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #007bff;
            color: #ffffff !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Xác thực Email người dùng CyberChat</h1>
        <p>Xin chào, chúc ngày mới tốt lành!</p>
        <p>Bạn vừa đăng ký tài khoản người dùng tại CyberChat.</p>
        <p>Hãy xác nhận địa chỉ email của bạn bằng cách nhấp vào nút bên dưới:</p>
        <a href="{{ route('reset_password', ['token' => $email_verification_token]) }}" class="btn">Xác nhận Email</a>
        <p>Nếu bạn không thực hiện hành động này, vui lòng bỏ qua email này.</p>
        <p>Xin cảm ơn,</p>
        <p>Ứng dụng nhắn tin CyberChat</p>
    </div>
</body>

</html>
