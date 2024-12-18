<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Registration Form</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50; /* Dark background color */
            margin: 0;
            padding: 0;
        }

        /* Container styling */
        .container {
            width: 50%;
            margin: 50px auto;
            background: rgba(0, 0, 0, 0.7); /* Dark form background with transparency */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            padding: 20px;
            border-radius: 8px;
            color: #fff; /* Text color for better contrast */
        }

        h1 {
            text-align: center;
            color: #f4f4f4; /* Light heading color */
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #f4f4f4; /* Label color */
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: none;
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.9); /* Slightly transparent input background */
            color: #333; /* Dark text for input fields */
        }

        button {
            width: 100%;
            padding: 10px;
            background: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }

        button:hover {
            background: #2980b9;
        }

        #output {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #e8f5e9;
            display: none;
            color: #333;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Online Registration Form</h1>
        <form id="registrationForm" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
            
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">-- Select Gender --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            
            <button type="submit" id="submitBtn">Submit</button>
        </form>
        <div id="output"></div>
    </div>

    <!-- JavaScript -->
    <script>
        $(document).ready(function() {
            $("#registrationForm").submit(function(event) {
                event.preventDefault(); // Prevent form default submission

                $.ajax({
                    url: '', // This file processes its own PHP
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $("#output").html(response).fadeIn();
                    },
                    error: function() {
                        alert("An error occurred while submitting the form.");
                    }
                });
            });
        });
    </script>

    <!-- PHP Code -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $gender = htmlspecialchars($_POST['gender']);

        // Return formatted response
        echo "<script>
                $('#output').html(`
                    <h2>Registration Successful</h2>
                    <p><strong>Name:</strong> $name</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Phone:</strong> $phone</p>
                    <p><strong>Gender:</strong> $gender</p>
                `).fadeIn();
            </script>";
    }
    ?>
</body>
</html>