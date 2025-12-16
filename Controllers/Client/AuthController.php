<?php

class AuthController
{

    private $userModel;

    public function __construct($connection)
    {
        $this->userModel = new User($connection);
    }

    public function login(): void
    {
        require_once "Views/login.php";
    }

    public function handleLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userModel->getOneUsers($email);

        if (empty($user) || !password_verify($password, $user['password'])) {
            $_SESSION['error'] = "Tài khoản hoặc mật khẩu của bạn không đúng.";
            header("Location: /?view=login");
            return;
        } else {
            $_SESSION['user'] = $user;
            header("Location: /");
            return;
        }
        // dump($user);
        // die;
        // echo "Handling login logic here.";
    }

    public function register()
    {
        if (isset($_SESSION['user'])) {
            header("Location: /");
            return;
        }
        require_once "Views/register.php";
    }

    public function handleRegister()
    {
        if (
            empty($_POST['email']) ||
            empty($_POST['full_name']) ||
            empty($_POST['password']) ||
            empty($_POST['confirm_password']) ||
            empty($_POST['phone']) ||
            empty($_POST['address'])
        ) {
            $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin";
            header("Location: /?view=register");
            return;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Email không đúng định dạng";
            header("Location: /?view=register");
            return;
        }

        if (strlen($_POST['password']) < 6) {
            $_SESSION['error'] = "Mật khẩu phải có ít nhất 6 ký tự";
            header("Location: /?view=register");
            return;
        }

        if (!preg_match('/^(0)[0-9]{9}$/', $_POST['phone'])) {
            $_SESSION['error'] = "Số điện thoại không hợp lệ";
            header("Location: /?view=register");
            return;
        }
        $phoneExist = $this->userModel->getByPhone($_POST['phone']);
        if (!empty($phoneExist)) {
            $_SESSION['error'] = "Số điện thoại đã được sử dụng";
            header("Location: /?view=register");
            return;
        }

        $email = $_POST['email'];

        $user = $this->userModel->getOneUsers($email);
        if (!empty($user)) {
            $_SESSION['error'] = 'Email đã được sử dụng, vui lòng chọn email khác. 
                                    Hoặc đăng nhập <a href="/?view=login">tại đây</a>';
            header("Location: /?view=register");
            return;
        }
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($password !== $confirmPassword) {
            $_SESSION['error'] = "Mật khẩu và xác nhận mật khẩu không khớp";
            header("Location: /?view=register");
            return;
        }

        $full_name = $_POST['full_name'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $this->userModel->createUsers($full_name, $password, $email, $phone, $address, 'customer');
        $_SESSION['success'] = "Đăng ký thành công. Vui lòng đăng nhập.";
        header("Location: /?view=login");
        return;
    }
}
// Nếu bạn quên mật khẩu, vui lòng sử dụng chức năng 
// <a href="/?view=forgot_password">quên mật khẩu</a>