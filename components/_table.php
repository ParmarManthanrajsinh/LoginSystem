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
                        print "<tr>";
                        print "<th scope='row'>" . $no . "</th>
                        <td><img src='" . $row['img_name'] . "' alt='LOL' hight='100px' width='100px'></tb>
                        <td>" . $row['first_name'] . " " . $row['last_name'] . "</tb>
                        <td>" . $row['dob'] . "</tb>
                        <td>" . $row['gender'] . "</tb>
                        <td>" . $row['city'] . "</tb>";
                        print "</tr>";
                        $no++;
                    }
                }
            }
            ?>
        </tbody>
    </table>
</div>