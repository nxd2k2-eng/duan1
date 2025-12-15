<?php
require_once __DIR__ . '/BaseModel.php';

class Category extends BaseModel { protected $table = 'Categories'; }
class Brand extends BaseModel { protected $table = 'Brands'; }
class User extends BaseModel { protected $table = 'Users'; }
?>