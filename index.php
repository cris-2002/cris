<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubuntu Server-PHP Deployment</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h3>Ubuntu Server-PHP Deployment</h3>
        <p>Form for user information - Cristy Jean L. Goc-ong</p>

        <!-- Form -->
        <form action="submit_form.php" method="POST">

            <!-- Firstname -->
            <div class="mb-3">
                <label for="firstname" class="form-label">Firstname:</label>
                <input type="text" name="firstname" id="firstname" class="form-control" required>
            </div>

            <!-- Middle -->
            <div class="mb-3">
                <label for="middle" class="form-label">Middle Name:</label>
                <input type="text" name="middle" id="middle" class="form-control" required>
            </div>

            <!-- Lastname -->
            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname:</label>
                <input type="text" name="lastname" id="lastname" class="form-control" required>
            </div>

            <!-- Age -->
            <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input type="number" name="age" id="age" class="form-control" required>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>

            <!-- Course & Section -->
            <div class="mb-3">
                <label for="course_section" class="form-label">Course & Section:</label>
                <input type="text" name="course_section" id="course_section" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
