<?php
require_once('config/conn.php');

class Students extends AbstractStudents{
    static function select() {
        global $conn;
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        $arr = array();
        
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $key => $value) {
                    $arr[$key][] = $value;
                }
            }
        }
        return $arr;
    }
    
    
    static function insert($id, $name, $email, $role_fk) {
        global $conn;
        $sql = "INSERT INTO students(id, name, email, role_fk) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('issi', $id, $name, $email, $role_fk);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }
    
    
    static function delete() {
        global $conn;
        $sql = "DELETE FROM students;";
        $conn->query($sql);
        $result = $conn->affected_rows > 0 ? true : false;
        return $result;
        
    }
    
    static function joinRoles($clauseAddition="") {
        global $conn;
        $sql = "SELECT s.id, s.name, s.email, r.role_name FROM students s, roles r WHERE s.role_fk = r.id " . $clauseAddition . ";";
        $result = $conn->query($sql);
        $arr = array();
        
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $key => $value) {
                    $arr[$key][] = $value;
                }
            }
        }
        return $arr;
    }
    
    static function fresh() {
        Students::delete();
        global $conn;
        $data = [
            [212410103087, 'Rahadyan Rizqy A', 'mymail@rdnet.id', 1],
            [212410103073, 'Achmad Faris F', 'achmadfaris@faris.id', 1],
            [212410101005, 'Christianus Yoga W', 'christyoga@christ.net', 1],
            [212410101059, 'Isabel Aprilia A', 'isabelapril@isabel.net', 1],
            [222410102085, 'Rastian Restu F', 'rastianrestu@rast.net', 2],
            [222410102075, 'Khisan Afif Nur R', 'khisanafif@nurr.net', 2],
            [202410102032, 'Imroatul Fitriyah', 'imroatul@fitri.net', 2],
            [202410102041, 'Laida Lavenia H', 'laidalavenia@laida.net', 2],
            // Add more data as needed
        ];
        
        foreach ($data as $row) {
            $id = $row[0];
            $name = $row[1];
            $email = $row[2];
            $role_fk = $row[3];
            
            $sql = "INSERT INTO students (id, name, email, role_fk) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('isss', $id, $name, $email, $role_fk);
            
            $stmt->execute();
            
        }
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }
    #####################
    static function selectById($id) { // select data by id
        global $conn;
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
    } //DITUGASKAN
    
    static function selectWhere($clause) { //select data by kondisi
        global $conn;
        $sql = "SELECT * FROM students WHERE $clause";
        $result = $conn->query($sql);
        $arr = array();
        
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $key => $value) {
                    $arr[$key][] = $value;
                }
            }
        }
        return $arr;
    } //DITUGASKAN
    
    static function updateById($id, $name, $email, $role_fk) { //update data by id
        global $conn;
        $sql = "UPDATE students SET name = ?, email = ?, role_fk = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssii', $name, $email, $role_fk, $id);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            return 'changed';
        } else {
            return 'unchanged';
        }
    } //DITUGASKAN
    
    
    static function updateWhere($clause, $name, $email, $role_fk) {
        global $conn;
        $sql = "UPDATE students SET name = ?, email = ?, role_fk = ? WHERE $clause";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssi', $name, $email, $role_fk);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    } //DITUGASKAN
    
    static function deleteById($id) { //delete data by id
        global $conn;
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    } //DITUGASKAN
    
    static function deleteWhere($clause) { //detele data by kondisi
        global $conn; 
        $sql = "DELETE FROM students WHERE $clause";
        $conn->query($sql);
        $result = $conn->affected_rows > 0 ? true : false;
        return $result;
    } //DITUGASKAN
}

###############################

class Roles {
    static function select() {
        global $conn;
        $sql = "SELECT * FROM roles";
        $result = $conn->query($sql);
        $arr = array();
        
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $key => $value) {
                    $arr[$key][] = $value;
                }
            }
        }
        return $arr;
    }
}

?>