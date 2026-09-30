<?php

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $req_type = '$_GET';
        $data = $_GET;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $req_type = '$_POST';
        $data = $_POST;
    }

    $age = $data['age'] ?? '';
    $gender = $data['gender'] ?? '';
    $email = $data['email'] ?? '';
    $address = $data['address'] ?? '';
    $contact = $data['contact'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP Output No. 1</title>

    <style>
        body {
            font-family: "Arial";
        }

        td {
            padding: 5px;
        }
    </style>
</head>

<body>

    <h2>
        Data is sent here, and it is stored at
        <?php echo $req_type; ?> variable
    </h2>

    <table>

        <tr>
            <td width="150">First Name:</td>
            <td style="text-decoration: underline">
                <?php echo htmlspecialchars($data['fname'] ?? ''); ?>
            </td>
        </tr>

        <tr>
            <td>Middle Name:</td>
            <td style="text-decoration: underline">
                <?php echo htmlspecialchars($data['mname'] ?? ''); ?>
            </td>
        </tr>

        <tr>
            <td>Last Name:</td>
            <td style="text-decoration: underline">
                <?php echo htmlspecialchars($data['lname'] ?? ''); ?>
            </td>
        </tr>

        <tr>
            <td>Age:</td>
            <td style="text-decoration: underline">
                <?php
                    if ($age >= 1 && $age <= 120) {
                        echo htmlspecialchars($age);
                    } else {
                        echo "Invalid age";
                    }
                ?>
            </td>
        </tr>

        <tr>
            <td>Gender:</td>
            <td style="text-decoration: underline">
                <?php echo htmlspecialchars($gender); ?>
            </td>
        </tr>

        <tr>
            <td>Email:</td>
            <td style="text-decoration: underline">
                <?php
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo htmlspecialchars($email);
                    } else {
                        echo "Invalid email";
                    }
                ?>
            </td>
        </tr>

        <tr>
            <td>Address:</td>
            <td style="text-decoration: underline">
                <?php echo htmlspecialchars($address); ?>
            </td>
        </tr>

        <tr>
            <td>Contact Number:</td>
            <td style="text-decoration: underline">
                <?php
                    if (preg_match('/^[0-9]{11}$/', $contact)) {
                        echo htmlspecialchars($contact);
                    } else {
                        echo "Invalid contact number";
                    }
                ?>
            </td>
        </tr>

    </table>

    <br><br>

    <a href="./">Return to Main Form</a>

</body>

</html>