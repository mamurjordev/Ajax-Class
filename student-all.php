<?php

include_once 'libs/database.php';

$allStudent = "SELECT * FROM students";
$result = $conn->query($allStudent);

$serial = 1;
while ($row = $result->fetch_assoc()) {
?>
    <tr>
        <td><?php echo $serial++; ?></td>
        <td><?php echo $row['fname']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td>
            <button id="delete-student" class="btn btn-sm btn-danger" student_id="<?php echo $row['id']; ?>">Delete</button>

            <button id="edit-student" class="btn btn-sm btn-info" student_id="<?php echo $row['id']; ?>">Edit</button>
        </td>
    </tr>

<?php }
$conn->close() ?>