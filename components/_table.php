<br><br>
<div class="container">
    <table class="table">
        <thead>
            <tr class="table-primary">
                <th scope="col">No.</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Gender</th>
                <th scope="col">City</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>




            <?php

            $sql = "SELECT * FROM `student`";
            $result = mysqli_query($conn, $sql);
            $no = 1;

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['user_id'] == $user_id) {
                        print "<tr><form action='Update_form.php' method='post'>";
                        print "<input type='hidden' name='id' value=" . $row['id'] . ">";
                        print "<th scope='row'>" . $no . "</th>
                        <td><img src='" . $row['img_name'] . "' alt='LOL' hight='100px' width='100px'></tb>
                        <td>" . $row['first_name'] . " " . $row['last_name'] . "</tb>
                        <td>" . $row['dob'] . "</tb>
                        <td>" . $row['gender'] . "</tb>
                        <td>" . $row['city'] . "</tb>
                        <td><button class='btn btn-sm btn-primary' name='updatebutton'>Update</button></form>
                        <form action='home.php' method='post'>
                        <input type='hidden' name='id' value=" . $row['id'] . ">
                        <button class='btn btn-sm btn-primary' name='deletebutton'>Delete</button>
                        </form>
                        </tb>";
                        print "</tr>";
                        $no++;
                    }
                }
            }
            ?>
        </tbody>
    </table>
</div>