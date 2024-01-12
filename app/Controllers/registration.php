<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;




class Registration extends Controller
{
    public function index()
    {
        return $this->loadView();
    }

    public function process()
    {
        // Load the form helper for validation
        helper(['form']);

        // Validate the form data
        $rules = [
            'full_name'  => 'required|max_length[50]',
            'city'       => 'required|max_length[50]',
            'education'  => 'required',
            'gmail'      => 'required|valid_email'
        
        ];

        if ($this->validate($rules)) {
            // Validation successful, proceed to save data to the database

            // Get form input data
            $full_name  = $this->request->getPost('full_name');
            $city       = $this->request->getPost('city');
            $education  = $this->request->getPost('education');
            $gmail      = $this->request->getPost('gmail');

            // Create an instance of the UserModel
            $userModel = new UserModel();

            // Insert data into the 'users' table
            $userModel->insert([
                'full_name' => $full_name,
                'city'      => $city,
                'education' => $education,
                'gmail'     => $gmail
            ]);
            session()->setFlashdata('successMessage', 'Registration successful!');

           
        // Load the view with user data
        return $this->loadView();
    } else {
        // Validation failed, redisplay the form with errors
        return $this->loadView(['validation' => $this->validator]);
    }
}

private function loadView($data = [])
{
    $userModel = new UserModel();

    // Fetch all registered users from the 'users' table
    

    $data['successMessage'] = session()->getFlashdata('successMessage');
    
    
    if ($data['successMessage']) {
        $data['users'] = $userModel->findAll();
    }

    return view('registration_form', $data);
}
    
public function edit($id)
{
    // Load the form helper for validation
    helper(['form']);

    // Create an instance of the UserModel
    $userModel = new UserModel();

    // Fetch user data by ID
    $data['user'] = $userModel->find($id);

    return view('edit_form', $data);
}


public function update($id)
{
    // Load the form helper for validation
    helper(['form']);

    // Validate the form data
    $rules = [
        'full_name'  => 'required|max_length[50]',
        'city'       => 'required|max_length[50]',
        'education'  => 'required',
        'gmail'      => 'required|valid_email'
    ];

    if ($this->validate($rules)) {
        // Validation successful, proceed to update data in the database

        // Get form input data
        $full_name  = $this->request->getPost('full_name');
        $city       = $this->request->getPost('city');
        $education  = $this->request->getPost('education');
        $gmail      = $this->request->getPost('gmail');

        // Create an instance of the UserModel
        $userModel = new UserModel();
        $currentDateTime = date('Y-m-d H:i:s');
        // Update data in the 'users' table
        $userModel->update($id, [
            'full_name' => $full_name,
            'city'      => $city,
            'education' => $education,
            'gmail'     => $gmail,
            'registration_date' => $currentDateTime // Update registration_date to current date and time


        ]);

       
        session()->setFlashdata('successMessage', 'User information updated successfully!');

        // Load the view with updated user data
        return $this->loadView(['user' => $this->request->getPost()]);
    } else {
        // Validation failed, redisplay the form with errors
        return view('edit_form', ['validation' => $this->validator, 'user' => $this->request->getPost()]);
    }
}



public function delete($id)
{
    // Create an instance of the UserModel
    $userModel = new UserModel();

    // Delete user by ID
    $userModel->delete($id);

   
   session()->setFlashdata('successMessage', 'User deleted successfully!');

    // Load the view with updated user data
    return $this->loadView();
}

}
