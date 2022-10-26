<?php
include_once("database.php");
?>

<html>

<head>
    <title>Spring Systems - Challenge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Spring System Coding Challenge</h3>
            </div>
        </div>

        <div class="row align-items-start">
            <div class="col">
                <button type="button" class="btn btn-success empl">Add Employee</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-success btn_cmp">Add Company</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-success btn_emp_rec">Show Employees</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-success btn_comp_rec">Show Companies</button>
            </div>
        </div>

        <!-- Employee Information Div -->
        <div class="row align-items-start emp" style="display: none">
            <h5>Employee Information</h5>
            <hr>
            <form class="row g-3" id="frm_emp" name="frm_emp" method="POST">
                <div class="col-md-3">
                    <label class="form-label">Full Name</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="emp_name" name="emp_name" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Present Position</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="emp_post" name="emp_post" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Company</label>
                </div>
                <div class="col-md-9">
                    <select class="form-control" name="comp" data-live-search="true" data-show-subtext="true" onchange='checkvalue(this.value)' id="comp" required>
                        <option disabled selected>-- Company List --</option>
                        <?php
                        $cmp_records = mysqli_query($con, "SELECT Distinct Comp_Name from tbl_company order by Comp_Name ASC");  // Use select query here
                        while ($data = mysqli_fetch_array($cmp_records)) {
                            echo "<option value='" . $data['Comp_Name'] . "'>" . $data['Comp_Name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Email</label>
                </div>
                <div class="col-md-9">
                    <input type="email" class="form-control" id="emp_email" name="emp_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Phone No.</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="emp_phone" name="emp_phone" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary empl" name="btn_Save_Record">Save Record</button>
                </div>
            </form>
        </div>


        <!-- Company Information Div -->
        <div class="row align-items-start comp" style="display: none">
            <h5>Company Information</h5>
            <hr>
            <form class="row g-3" id="frm_comp" name="frm_comp" method="POST">
                <div class="col-md-3">
                    <label class="form-label">Name</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="comp_name" name="comp_name" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Address</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="comp_addr" name="comp_addr" required>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary comp" name="btn_Save_Comp">Save Record</button>
                </div>
            </form>
        </div>


        <!-- Employee Details Div -->
        <div class="row align-items-start emp_det" style="display: none">
            <h5>Employee Details</h5>
            <hr>
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
            <p id="record"></p>
            <br>
            <table class="table table-bordered table-hover" id="emp_Table">
                <thead>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                </thead>
                <tbody>
                    <?php
                    $emp_result = mysqli_query($con, "SELECT * FROM tbl_employee");
                    while ($fet_emp = mysqli_fetch_array($emp_result)) {
                        echo "<tr>";
                        echo "<td>" . $fet_emp['Emp_ID'] . "</td>";
                        echo "<td>" . $fet_emp['Emp_Name'] . "</td>";
                        echo "<td>" . $fet_emp['Emp_Post'] . "</td>";
                        echo "<td>" . $fet_emp['Emp_Comp'] . "</td>";
                        echo "<td>" . $fet_emp['Emp_Email'] . "</td>";
                        echo "<td>" . $fet_emp['Emp_Phone'] . "</td>";
                        echo "</tr>";
                    }
                    if (mysqli_num_rows($emp_result) == 0) {
                        echo "Record not Found";
                    }
                    ?>
                </tbody>

            </table>
        </div>


        <!-- Company Details Div -->
        <div class="row align-items-start comp_det" style="display: none">
            <h5>Company Details</h5>
            <hr>
            <input class="form-control" id="cmp_search" type="text" placeholder="Search..">
            <p id="cmp_record"></p>
            <br>
            <table class="table table-bordered table-hover" id="cmp_Table">
                <thead>
                    <th>Company ID</th>
                    <th>Name</th>
                    <th>Address</th>
                </thead>
                <tbody>
                    <?php
                    $comp_result = mysqli_query($con, "SELECT * FROM tbl_company");
                    while ($fet_comp = mysqli_fetch_array($comp_result)) {
                        echo "<tr>";
                        echo "<td>" . $fet_comp['Comp_ID'] . "</td>";
                        echo "<td>" . $fet_comp['Comp_Name'] . "</td>";
                        echo "<td>" . $fet_comp['Comp_Addr'] . "</td>";
                        echo "</tr>";
                    }
                    if (mysqli_num_rows($comp_result) == 0) {
                        echo "Record not Found";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $(".empl").click(function() {
            $(".comp").css("display", "none");
            $(".emp_det").css("display", "none");
            $(".comp_det").css("display", "none");
            $(".emp").css("display", "block");
        });


        $(".btn_cmp").click(function() {
            $(".emp").css("display", "none");
            $(".emp_det").css("display", "none");
            $(".comp_det").css("display", "none");
            $(".comp").css("display", "block");
        });

        $(".btn_emp_rec").click(function() {
            $(".emp").css("display", "none");
            $(".comp").css("display", "none");
            $(".comp_det").css("display", "none");
            $(".emp_det").css("display", "block");
        });

        $(".btn_comp_rec").click(function() {
            $(".emp").css("display", "none");
            $(".comp").css("display", "none");
            $(".emp_det").css("display", "none");
            $(".comp_det").css("display", "block");
        });


        $("#myInput").on("keyup", function() {

            var value = $(this).val().toLowerCase();
            $("#emp_Table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

            var numOfVisibleRows = $('#emp_Table tr:visible').length;
            $("#record").text("No. of records: " + numOfVisibleRows);
        });



        $("#cmp_search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#cmp_Table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

            var numOfRec = $('#cmp_Table tr:visible').length;
            $("#cmp_record").text("No. of records: " + numOfRec);
        });
    });
</script>


<?php
if (isset($_POST['btn_Save_Record'])) {
    $emp_name = $_POST['emp_name'];
    $emp_post = $_POST['emp_post'];
    $emp_comp = $_POST['comp'];
    $emp_email = $_POST['emp_email'];
    $emp_phone = $_POST['emp_phone'];

    $save_user = mysqli_query($con, "insert into tbl_employee(Emp_ID, Emp_Name, Emp_Post, Emp_Comp, Emp_Email, Emp_Phone) values (default, '$emp_name','$emp_post','$emp_comp','$emp_email', '$emp_phone')");

    if ($save_user) {
        echo "<script>alert('User Registered Successfully!')</script>
    <script>window.open('index.php','_self')</script>";
    } else {
        echo "Data Not Saved ";
        echo mysqli_error($con);
        exit();
    }
}


if (isset($_POST['btn_Save_Comp'])) {
    $comp_name = $_POST['comp_name'];
    $comp_address = $_POST['comp_addr'];

    $save_comp = mysqli_query($con, "insert into tbl_company(Comp_ID, Comp_Name, Comp_Addr) values (default, '$comp_name','$comp_address')");

    if ($save_comp) {
        echo "<script>alert('Company Registered Successfully!')</script>
    <script>window.open('index.php','_self')</script>";
    } else {
        echo "Data Not Saved ";
        echo mysqli_error($con);
        exit();
    }
}


?>