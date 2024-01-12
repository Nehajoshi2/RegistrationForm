<!-- app/Views/success.php -->

<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <!-- Include your CSS styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
        }
    </style>
    <!-- app/Views/success.php -->



    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- Add Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">

<!-- Rest of your HTML content -->

</head>
<body>
   
    <h1>Check details!</h1>

    
    <!-- app/Views/success.php -->

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



</body>
</html>

