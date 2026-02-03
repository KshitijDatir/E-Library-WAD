<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $phone = $_POST["phone"] ?? "";
    $password = $_POST["password"] ?? "";
    $city = $_POST["city"] ?? "";
    $address = $_POST["address"] ?? "";

    /* Gender */
    $gender = $_POST["gender"] ?? "";

    /* Interests */
    $interests = $_POST["interest"] ?? [];
    $interestList = implode(", ", $interests);

    /* Image Upload */
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir);
    }

    $imageName = $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $targetFile = $uploadDir . basename($imageName);

    move_uploaded_file($tmpName, $targetFile);

    echo "<h2>Registration Successful</h2>";

    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>Interests:</strong> $interestList</p>";
    echo "<p><strong>City:</strong> $city</p>";
    echo "<p><strong>Address:</strong> $address</p>";

    echo "<p><strong>Profile Image:</strong></p>";
    echo "<img src='$targetFile' width='150'>";

} else {
    echo "Invalid Request.";
}

?>
