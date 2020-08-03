<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    public $id;
    public $email;
    public $name;
    public $role;
    public $birthday;
    public $phone;
    public $password;

    public function __construct($email, $name, $role, $birthday, $phone) {
        $this->email = $email;
        $this->name = $name;
        $this->role = $role;
        $this->birthday = $birthday;
        $this->phone = $phone;
    }

    public function exportToJson(){
        $user = new \stdClass();
        $user->id = $this->id;
        $user->email = $this->email;
        $user->name = $this->name;
        $user->role = $this->role;;
        $user->birthday = $this->birthday;
        $user->phone = $this->phone;
        $user->password = $this->password;
        return $user;
    }
}
?>