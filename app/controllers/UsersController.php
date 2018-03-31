<?php

namespace App\Controllers;

use \App\Core\App;

class UsersController
{
    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return render('users', compact('users'));
    }

    public function add_name()
    {
        $name = htmlspecialchars($_POST['name']);
        App::get('database')->insert('users', compact('name'));

        redirect('users');
    }

    public function delete_name()
    {
        $name = htmlspecialchars($_POST['name']);
        App::get('database')->delete('users', ['name'=>$name]);

        redirect('users');
    }

}
