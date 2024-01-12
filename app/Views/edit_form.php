<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
<div class="container">

    <h1>Edit User data</h1>

    <?php if (isset($validation)): ?>
        <?= \Config\Services::validation()->listErrors() ?>
    <?php endif; ?>

    <?= form_open('registration/update/' . $user['id']) ?>

    <label for="full_name">Full Name:</label>
    <input type="text" name="full_name" value="<?= $user['full_name'] ?>" required>

    <label for="city">City:</label>
    <input type="text" name="city" value="<?= $user['city'] ?>" required>

    <label for="education">Education:</label>
<select name="education" required>
    <option value="BCA" <?= ($user['education'] == 'BCA') ? 'selected' : '' ?>>BCA</option>
    <option value="MCA" <?= ($user['education'] == 'MCA') ? 'selected' : '' ?>>MCA</option>
    <option value="BE/BTECH" <?= ($user['education'] == 'BE/BTECH') ? 'selected' : '' ?>>BE/BTECH</option>
    <option value="BSCIT" <?= ($user['education'] == 'BSCIT') ? 'selected' : '' ?>>BSCIT</option>
</select>

    </br>
    
    <label for="gmail">Gmail:</label>
    <input type="email" name="gmail" value="<?= $user['gmail'] ?>" required>

    <button type="submit">Update User</button>

    <?= form_close() ?>
    
    </div>
    <script>
    <?php if (isset($_SESSION['record_updated']) && $_SESSION['record_updated']): ?>
        alert('Record updated successfully!');
        <?php unset($_SESSION['record_updated']); ?> // Clear the session variable after displaying the alert
    <?php endif; ?>
</script>
</body>
</html>
