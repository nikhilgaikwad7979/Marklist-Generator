<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marksheet Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: auto;
            margin-top: 50px;
        }
        .form-header {
            background-color: #0d6efd;
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>Marksheet Generator</h2>
            <p>Fill out the form to generate a professional marksheet</p>
        </div>
        <form action="create.php" method="POST" enctype="multipart/form-data">
            <!-- College Details -->
            <div class="mb-4">
                <label for="college" class="form-label">College Name</label>
                <input type="text" name="college" id="college" class="form-control" placeholder="Enter college name" required>
            </div>
            <div class="mb-4">
                <label for="academic_year" class="form-label">Academic Year</label>
                <input type="text" name="academic_year" id="academic_year" class="form-control" placeholder="E.g., 2023-2024" required>
            </div>

            <!-- Student Details -->
            <h5 class="text-primary">Student Details</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Student Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter student's name" required>
                </div>
                <div class="col-md-6">
                    <label for="roll_no" class="form-label">Roll Number</label>
                    <input type="text" name="roll_no" id="roll_no" class="form-control" placeholder="Enter roll number" required>
                </div>
            </div>
            <div class="mt-4">
                <label for="photo" class="form-label">Upload Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
            </div>

            <!-- Marks Input -->
            <h5 class="text-primary mt-5">Subject Marks</h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="subject1" class="form-label">C Languages</label>
                    <input type="number" name="subject1" id="subject1" class="form-control" placeholder="Enter marks" required>
                </div>
                <div class="col-md-4">
                    <label for="subject2" class="form-label">DSA</label>
                    <input type="number" name="subject2" id="subject2" class="form-control" placeholder="Enter marks" required>
                </div>
                <div class="col-md-4">
                    <label for="subject3" class="form-label">PHP</label>
                    <input type="number" name="subject3" id="subject3" class="form-control" placeholder="Enter marks" required>
                </div>
                <div class="col-md-4">
                    <label for="subject3" class="form-label">Laravel</label>
                    <input type="number" name="subject3" id="subject3" class="form-control" placeholder="Enter marks" required>
                </div>
                <div class="col-md-4">
                    <label for="subject3" class="form-label">My-SQl</label>
                    <input type="number" name="subject3" id="subject3" class="form-control" placeholder="Enter marks" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-primary btn-lg w-100">Generate Marksheet</button>
            </div>
        </form>
    </div>
</body>
</html>
