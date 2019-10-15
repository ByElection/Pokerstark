<?php
include_once('./Views/ProfileView.php');
include_once('./Models/ProfileModel.php');

class ProfileController {
  private $view;
  private $model;

  public function __construct() {
    $this->view = new ProfileView();
    $this->model = new ProfileModel();
  }
  public function showProfile() {
    $this->view->showProfile();
  }

}
?>
