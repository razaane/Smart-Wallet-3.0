<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Income</title>
<style>
    body { background: #f0f2f5; font-family: Arial, sans-serif; }
    .edit-form {
        width: 350px;
        margin: 50px auto;
        padding: 25px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .edit-form label { display: block; font-weight: bold; margin-bottom: 6px; color: #333; }
    .edit-form input {
        width: 100%;
        padding: 10px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }
    .edit-form input:focus {
        border-color: #3b82f6;
        outline: none;
        box-shadow: 0 0 5px rgba(59,130,246,0.4);
    }
    .edit-form button {
        width: 100%;
        padding: 12px;
        background: #3b82f6;
        border: none;
        border-radius: 6px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        font-weight: bold;
    }
    .edit-form button:hover { background: #1d4ed8; }
</style>
</head>
<body>

<form action="" method="POST" class="edit-form">
    <input type="hidden" name="id" value="<?= htmlspecialchars($rs['id']) ?>">

    <label>Montant:</label>
    <input type="number" name="montant" value="<?= htmlspecialchars($rs['montant']) ?>" required>

    <label>Date:</label>
    <input type="date" name="date" value="<?= htmlspecialchars($rs['la_date']) ?>" required>

    <label>Description:</label>
    <input type="text" name="descreption" value="<?= htmlspecialchars($rs['descreption']) ?>" required>

    <button type="submit">Update</button>
</form>

</body>
</html>
