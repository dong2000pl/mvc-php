<?php


    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    else{
        $action = '';
    }
    $success = array();

    switch($action){
        case 'add':{  
            if(isset($_POST['add_member'])){
                $name = $_POST['name'];
                $born = $_POST['born'];
                $address = $_POST['address'];

                if($db->insertData($name, $born, $address)){

                    $success[] = 'success';
                    header('location: index.php?action=list');
                }
            }  
            require_once('View/add.php');
            break;
        }

        case 'edit':{  
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $tblTable = 'members';
                $dataID = $db->getByID($tblTable, $id);

                if(isset($_POST['update_member'])){
                    // du lieu tu view
                    $sname = $_POST['name'];
                    $sbirthday = $_POST['birthday'];
                    $scountry = $_POST['country']; 

                    // truyen sang model
                    if($db->updateMember($id, $sname, $sbirthday, $scountry)){
                        $success[] = 'success';
                        header('location: index.php?action=list');
                    }
                }
            }  
            require_once('View/edit_member.php');
            break;
        }

        case 'delete':{     
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $tblTable = 'member';
                if($db->delete($id,$tblTable)){
                    header('location: index.php?controller&action=list');
                }
            }
            else{
                header('location: index.php?controller&action=list');
            }
            break;
        }

        case 'list':{     
            $tblMember = "member";
            $datas = $db->getAllData($tblMember);
            require_once('View/list.php');
            break;
        }

        default:{
            $tblMember = "member";
            $datas = $db->getAllData($tblMember);
            require_once('View/list.php');
            break;
        }
    }
?>