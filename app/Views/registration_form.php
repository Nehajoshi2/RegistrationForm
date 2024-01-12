<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
    <!--bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- Add Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyC8A+dt5EnEeSTsdJ3QGgkWTAhYXsFfsJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>
<!--for success message using bootstrap-->

<?php if (isset($successMessage)): ?>
    <script>
        // Display SweetAlert success message at the top
        Swal.fire({
            position: 'top',
            icon: 'success',
            title: 'Success!',
            text: '<?= $successMessage ?>',
            showConfirmButton: false,
            timer: 3000 // 3 seconds tiem to dislay msg
        });
    </script>
<?php endif; ?>

    <div class="container">
        <h1>Registration Form</h1>
        <form action="<?= base_url('registration/process') ?>" method="post">
            <!-- Add your form fields here -->
            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" required>

            <label for="city">City:</label>
            <input type="text" name="city" required>

            <label for="education">Education:</label>
            <select name="education" required>
                <option value="" disabled selected>Select</option>
                <option value="BCA">BCA</option>
                <option value="MCA">MCA</option>
                <option value="BE/BTech">BE/BTech</option>
                <option value="BSCIT">BSCIT</option>
            </select>
            <br>

            <label for="gmail">Email:</label>
            <input type="email" name="gmail" required>

            <button type="submit">Register</button>
        </form>
        <?= \Config\Services::validation()->listErrors(); ?>
<br><br>


</div>
<div class="table-container">
        <?php if (isset($users) && !empty($users)): ?>
            <hr>
            
             <h2>Registered Users</h2>
            <!-- Display the table of registered users -->
            <table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Sr.NO.</th>
            <th>Full Name</th>
            <th>Date</th>

            <th>City</th>
            <th>Education</th>
            <th>Gmail</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php $sno=1 ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $sno++?></td>
                <td><?= $user['full_name'] ?></td>
                <td><?= $user['registration_date'] ?></td> 
                <td><?= $user['city'] ?></td>
                <td><?= $user['education'] ?></td>
                <td><?= $user['gmail'] ?></td>
                <td>
                    <a href="<?= base_url('registration/edit/' . $user['id']) ?>" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </td>
                <td>
                    <a href="<?= base_url('registration/delete/' . $user['id']) ?>" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
        <?php endif; ?>
        </div>

       
</body>
</html>
