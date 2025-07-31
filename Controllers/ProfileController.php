<?php
require_once 'Models/ProfileModel.php';
require_once 'BaseController.php';
class ProfileController extends BaseController
{
    private $model;
    function __construct()
    {
        $this->model =  new ProfileModel();
    }

    function profile() {
        session_start();
        if (!isset($_SESSION['user'])) {
            
            $this->redirect('/auth/login');
            return;
        }
    
        $userId = $_SESSION['user']['user_id'];
        $user = $this->model->getUserProfile($userId);
        $this->view('/profileUser/profile', ['user' => $user]);
    }

    function editProfile($id)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $user = $this->model->getUserProfile($id);
        $this->view('profile/edit',['user'=>$user]);
    }


    
    function updateProfile($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['user_id'];
            
            // Image Upload Handling
            $profileImage = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $target_dir = "Assets/images/uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $profileImage = basename($_FILES['image']['name']);
                $targetPath = $target_dir . $profileImage;
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                    echo "Error: Failed to upload image.";
                    return;
                }
            } else {
                // If no new image is uploaded, keep the existing image
                $user = $this->model->getUserProfile($id);
                $profileImage = $user['image'];
            }

            $data = [
                'image' => $profileImage,
                'FirstName' => $_POST['FirstName'],
                'LastName' => $_POST['LastName'],
                'email' => $_POST['email'],
                'role' => $_POST['role'],
                'phone' => $_POST['phone'],
            ];

            $this->model->updateUser($id, $data);
            $this->redirect('/profile');
        }
    }
}