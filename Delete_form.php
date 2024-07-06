<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add student</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script><br><br>

    <div class="container border">
        <form action="home.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">First name:</label>
                <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Last name:</label>
                <input type="text" class="form-control" name="last_name" required>
            </div>
            <div class="mb-5">
                <label class="form-label">Date of Birth:</label>
                <input type="date" class="form-control" name="dob" required>
            </div>
            <div class="mb-5">
                <label class="form-label">Gender:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Male" required>
                    <label class="form-check-label">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Female" required>
                    <label class="form-check-label">
                        Female
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="city" required>
                    <option value="" selected disabled>City menu</option>
                    <option value="Ahmedabad">Ahmedabad</option>
                    <option value="Surat">Surat</option>
                    <option value="Vadodara">Vadodara</option>
                    <option value="Rajkot">Rajkot</option>
                    <option value="Bhavnagar">Bhavnagar</option>
                    <option value="Jamnagar">Jamnagar</option>
                    <option value="Junagadh">Junagadh</option>
                    <option value="Gandhinagar">Gandhinagar</option>
                    <option value="Anand">Anand</option>
                    <option value="Navsari">Navsari</option>
                    <option value="Morbi">Morbi</option>
                    <option value="Surendranagar">Surendranagar</option>
                    <option value="Bharuch">Bharuch</option>
                    <option value="Mehsana">Mehsana</option>
                    <option value="Vapi">Vapi</option>
                    <option value="Nadiad">Nadiad</option>
                    <option value="Palanpur">Palanpur</option>
                    <option value="Gondal">Gondal</option>
                    <option value="Porbandar">Porbandar</option>
                    <option value="Godhra">Godhra</option>
                    <option value="Dahod">Dahod</option>
                    <option value="Botad">Botad</option>
                    <option value="Veraval">Veraval</option>
                    <option value="Patan">Patan</option>
                    <option value="Amreli">Amreli</option>
                    <option value="Deesa">Deesa</option>
                    <option value="Dhoraji">Dhoraji</option>
                    <option value="Modasa">Modasa</option>
                    <option value="Kalol">Kalol</option>
                    <option value="Himmatnagar">Himmatnagar</option>
                </select>
            </div>

            <div class="input-group mb-5">
                <input type="file" class="form-control" name="img_name" required>
                <label class="input-group-text">Photo of Student</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

</body>

</html>