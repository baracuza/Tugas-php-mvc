<?php
require_once 'controller/controllers.php';
class RoleController{
    static function index() {
        view('subview/roles', [
            'roles' => Roles::select(),
            'header' => titleheader('Read data scr AJAX dgn jQuery', 'h1', 'text-center mb-3')
        ]);
    }

    #############
    static function getRoles($id) { //kode untuk menampilkan data by role id 
        if (is_numeric($id)) {
            $students = Students::joinRoles("AND r.id = $id");
            // Di sini memanggil metode joinroles dalam class studen dan mengambil data siswa yang sesuai dengan ID role
    
            echo json_encode($students);
            // Respon Ajax jadi dikembalikan dalam json
        } else {
            echo json_encode(array('error' => 'Invalid role ID'));
        }
    }     # Ditugaskan
}