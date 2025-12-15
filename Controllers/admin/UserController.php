<?php
require_once __DIR__ . '/../../Models/User.php';

class UserController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->all();
        require_once __DIR__ . '/../../SrcCatGiaoDien/admin/View/pages/user/list.php';
    }

    // create, edit, delete tương tự Category
}
?>