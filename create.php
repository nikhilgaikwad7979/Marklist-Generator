<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $college = $_POST['college'];
    $academic_year = $_POST['academic_year'];
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];

    // Handle photo upload
    $photo = null;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $uploads_dir = 'uploads/';
        if (!is_dir($uploads_dir)) {
            mkdir($uploads_dir, 0755, true); // Create the uploads directory if it doesn't exist
        }
        $photo = $uploads_dir . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
    }

    // Subject marks
    $marks = [
        'Subject 1' => intval($_POST['subject1']),
        'Subject 2' => intval($_POST['subject2']),
        'Subject 3' => intval($_POST['subject3']),
    ];

    // Calculate total, percentage, and grade
    $total = array_sum($marks);
    $percentage = $total / count($marks);
    $grade = ($percentage >= 90) ? "A+" : (($percentage >= 75) ? "A" : (($percentage >= 50) ? "B" : "C"));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Marksheet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .marksheet-container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border: 2px solid #000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .marksheet-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .photo-box {
            text-align: center;
            border: 1px solid #000;
            padding: 5px;
            width: 100px;
            height: 120px;
            margin: auto;
        }
        .details-table, .marks-table {
            width: 100%;
            border-collapse: collapse;
        }
        .details-table td, .marks-table th, .marks-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        .details-table {
            margin-bottom: 20px;
        }
        .marks-table th {
            background-color: #e9ecef;
        }
        .qr-box {
            text-align: center;
            margin-top: 20px;
        }
        .btn-print {
            display: block;
            width: 100%;
            margin-top: 20px;
        }
        @media print {
            .btn-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="marksheet-container">
        <div class="marksheet-header">
            <h3><?php echo htmlspecialchars($college); ?></h3>
            <h4>Marksheet</h4>
            <p><strong>Academic Year:</strong> <?php echo htmlspecialchars($academic_year); ?></p>
        </div>

        <table class="details-table">
            <tr style="margin: right 20px;" >
                <td><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></td>
                <td><strong>Roll Number:</strong> <?php echo htmlspecialchars($roll_no); ?></td>
            <td >
                    <div rowspan="4" class="photo-box" style='max-width: 100%; max-height: 100%;' >
                        <?php 
                        if ($photo) {
                            echo "<img src='$photo' alt='Student Photo' >";
                        } else {
                            echo "No Photo Uploaded";
                        }
                        ?>
                    </div>
                </td>
             </tr>
            <tr>
               
            </tr>
            
        </table>

        <table class="marks-table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marks as $subject => $mark): ?>
                <tr>
                    <td><?php echo htmlspecialchars($subject); ?></td>
                    <td><?php echo $mark; ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><?php echo $total; ?></td>
                </tr>
                <tr>
                    <td><strong>Percentage</strong></td>
                    <td><?php echo number_format($percentage, 2); ?>%</td>
                </tr>
                <tr>
                    <td><strong>Grade</strong></td>
                    <td><?php echo $grade; ?></td>
                </tr>
            </tbody>
        </table>

      

        <button class="btn btn-primary btn-print" onclick="window.print()">Print Marksheet</button>
        <a href="index.php" class="btn btn-secondary btn-print">Go Back</a>
    </div>
</body>
</html>
