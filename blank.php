<!-- just a template page -->
<?php

require_once 'db.php';
$urn = 19131048;

?>

<!DOCTYPE html>
<html lang="en">

<head id="head">
    <title>StudentsForm</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Main CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="main.css" />
    <style>
        .heading {
            font-size: 2.3rem !important;
            font-weight: bold !important;
        }

        td,
        th {
            min-width: 100px;
        }

        .txtarea {
            display: flex;
            width: 100%;
        }
    </style>
    <!-- Font-icon css-->
</head>

<body class="app">
    <main class="app-content">
        <div class="app-title d-flex justify-content-center">
            <div>
                <h1 class="heading">Students Counselling</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile row">
                    <div class="col-md-12">
                        <h2>Personal Details<h2>
                    </div>

                    <div class="col-12 p-5">

                        <?php
                        $personal_details_query = "SELECT * FROM personal_details WHERE urn = '$urn'";
                        $res = $con->query($personal_details_query);
                        // print_r($res);
                        $personal_details = array();
                        $personal_details = $res->fetch_assoc();
                        if (!$personal_details) {
                            $personal_details = array(
                                "division" => "",
                                "roll_no" => "",
                                "branch" => "",
                                "name" => "",
                                "guardian_name" => "",
                                "occupication" => "",
                                "urn" => "",
                                "admission_type" => "",
                                "dob" => "",
                                "bloodgroup" => "",
                                "mothertoungue" => "",
                                "year_of_admission" => "",
                                "aadhar_number" => "",
                                "staying_with" => "",
                                "address" => "",
                                "mobile_no" => "",
                                "parents_no" => "",
                                "email" => "",
                                "hobbies" => "",
                                "strengths" => "",
                                "special_achivements" => ""
                            );
                        }
                        ?>


                        <form class="row g-3">
                            <div class="col-md-12 d-flex flex-column align-items-center">
                                <img class="mb-4" id="blah" alt="" width="200" height="200" />
                                <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>



                            <div class="col-md-6">
                                <label for="name_of_student" class="form-label">Name of the Student</label>
                                <input type="text" name="name_of_student" class="form-control" id="name_of_student" value="<?php echo $personal_details['name']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="branch" class="form-label">Branch</label>
                                <?php
                                $interests = array(
                                    'cse' => 'Computer Science and Engineering',
                                    'mech' => 'Mechanical Engineering',
                                    'aero' => 'Aeronautical Engineering',
                                    'electrical' => 'Electrical Engineering',
                                    'auto' => 'Automobile Engineering',
                                    'civil' => 'Civil Engineering',
                                    'food' => 'Food Technology',
                                );
                                ?>


                                <select class="form-select" name="branch">
                                    <?php foreach ($interests as $var => $interest) : ?>
                                        <option value="<?php echo $var ?>" <?php if ($var == $personal_details['branch']) : ?> selected="selected" <?php endif; ?>><?php echo $interest ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="roll_no" class="form-label">Roll No.</label>
                                <input type="number" name="roll_no" class="form-control" id="roll_no" maxlength="4" value="<?php echo $personal_details['roll_no']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="prn_no" class="form-label">PRN No.</label>
                                <input type="number" name="prn_no" class="form-control" id="prn_no" maxlength="8" value="<?php echo $personal_details['urn']; ?>">
                            </div>


                            <div class="col-md-6">
                                <label for="name_of_guardian" class="form-label">Guardian's Name</label>
                                <input type="text" name="name_of_guardian" class="form-control" id="name_of_guardian" value="<?php echo $personal_details['guardian_name']; ?>">
                            </div>


                            <div class="col-md-6">
                                <label for="guardian_occupation" class="form-label">Guardian's Occupation</label>
                                <input type="text" name="guardian_occupation" class="form-control" id="guardian_occupation" value="<?php echo $personal_details['occupication']; ?>">
                            </div>


                            <div class="col-md-6">
                                <label for="admission_type" class="form-label">Admission Type</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="admission_type" id="admission_type1" <?php if ($personal_details['admission_type'] == 1) : ?> checked <?php endif; ?>>
                                        <label class="form-check-label" for="admission_type1">CAP</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="admission_type" id="admission_type2" <?php if ($personal_details['admission_type'] == 2) : ?> checked <?php endif; ?>>
                                        <label class="form-check-label" for="admission_type2">Management</label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="<?php echo date('Y-m-d', strtotime($personal_details["dob"])) ?>">

                            </div>



                            <div class="col-md-6">
                                <label for="blood_group" class="form-label">Blood Group</label>
                                <input type="text" name="blood_group" class="form-control" id="blood_group" value="<?php echo $personal_details['bloodgroup']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="mother_tongue" class="form-label">Mother Tongue</label>
                                <input type="text" name="mother_tongue" class="form-control" id="mother_tongue" value="<?php echo $personal_details['mothertoungue']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="year_of_admission" class="form-label">Year of admission</label>
                                <input type="number" placeholder="YYYY" name="year_of_admission" class="form-control" id="year_of_admission" min="2015" maxlength="4" value="<?php echo $personal_details['year_of_admission']; ?>">
                            </div>


                            <div class="col-md-6">
                                <label for="aadhar_no" class="form-label">Aadhar No.</label>
                                <input type="number" name="aadhar_no" class="form-control" id="aadhar_no" maxlength="12" value="<?php echo $personal_details['aadhar_number']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="staying_with" class="form-label">Staying With</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="staying_with" id="staying_with1" value="parents" <?php if ($personal_details['staying_with'] == 1) : ?> checked <?php endif; ?>>
                                        <label class="form-check-label" for="staying_with1">Parents</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="staying_with" id="staying_with2" value="guardian" <?php if ($personal_details['staying_with'] == 2) : ?> checked <?php endif; ?>>
                                        <label class="form-check-label" for="staying_with2">Guardian</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="staying_with" id="staying_with3" value="hostel" <?php if ($personal_details['staying_with'] == 3) : ?> checked <?php endif; ?>>
                                        <label class="form-check-label" for="staying_with3">Hostel</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="mobile" class="form-label">Mobile Number</label>
                                <input type="number" name="mobile" class="form-control" id="mobile" value="<?php echo $personal_details['mobile_no']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="parents_number" class="form-label">Parents Mobile Number</label>
                                <input type="number" name="parents_number" class="form-control" id="parents_number" value="<?php echo $personal_details['parents_no']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="<?php echo $personal_details['email']; ?>">
                            </div>

                            <div class="col-md-12">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" rows="4" class="txtarea">  <?php echo $personal_details['address']; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="hobbies">Hobbies</label>
                                <textarea id="hobbies" name="hobbies" rows="4" class="txtarea">    <?php echo $personal_details['hobbies']; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="strength">Strengths</label>
                                <textarea id="strength" name="strength" rows="4" class="txtarea"> <?php echo $personal_details['strengths']; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="achievements">Special Achievements</label>
                                <textarea id="achievements" name="achievements" rows="4" class="txtarea"> <?php echo $personal_details['special_achivements']; ?></textarea>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile row">
                    <div class="col-md-12">
                        <h2>Earlier Education History<h2>
                    </div>
                    <div style="overflow:auto">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Marks(%)</th>
                                    <th scope="col">Medium</th>
                                    <th scope="col">Place of Study</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $urn_type = $urn . "_ssc";
                                $default_education =  array("urn_type" => "", "year" => "", "marks" => "", "medium" => "", "place_of_study" => "");
                                $ssc_data_query = "SELECT * FROM earliar_education WHERE urn_type = '$urn_type'";
                                // print($ssc_data_query);
                                $res = $con->query($ssc_data_query);
                                $ssc_data = $res->fetch_assoc();
                                if (!$ssc_data) {
                                    $ssc_data =$default_education;
                                }
                                ?>
                                <tr>
                                    <th scope="row">SSC</th>
                                    <td>

                                        <input type="number" placeholder="YYYY" name="ssc_year" class="form-control" id="ssc_year" min="2015" maxlength="4" value="<?php echo $ssc_data['year']; ?>">
                                    </td>
                                    <td>
                                        <input type="number" name="ssc_marks" placeholder="Percentage" class="form-control" id="ssc_marks" maxlength="12" value="<?php echo $ssc_data['marks']; ?>">
                                    </td>
                                    <td>
                                        <input type="text" name="ssc_medium" placeholder="Medium" class="form-control" id="ssc_medium" value="<?php echo $ssc_data['medium']; ?>">
                                    </td>
                                    <td><input type="text" name="ssc_place" placeholder="Place" class="form-control" id="ssc_place" value="<?php echo $ssc_data['place_of_study']; ?>"></td>
                                </tr>
                                <?php
                                $urn_type = $urn . "_hsc";
                                $hsc_data_query = "SELECT * FROM earliar_education WHERE urn_type = '$urn_type'";
                                // print($ssc_data_query);
                                $res = $con->query($hsc_data_query);
                                $hsc_data = $res->fetch_assoc();
                                if (!$hsc_data) {
                                    $hsc_data =$default_education;
                                }
                                ?>
                                    <tr>
                                        <th scope="row">HSC</th>
                                        <td>

                                            <input type="number" placeholder="YYYY" name="hsc_year" class="form-control" id="hsc_year" min="2015" maxlength="4" value="<?php echo $ssc_data['year']; ?>">
                                        </td>
                                        <td><input type="number" name="hsc_marks" placeholder="Percentage" class="form-control" id="hsc_marks" maxlength="12" value="<?php echo $ssc_data['marks']; ?>"></td>
                                        <td><input type="text" name="hsc_medium" placeholder="Medium" class="form-control" id="hsc_medium" value="<?php echo $ssc_data['medium']; ?>">
                                        </td>
                                        <td><input type="text" name="hsc_place" placeholder="Place" class="form-control" id="hsc_place" value="<?php echo $ssc_data['place_of_study']; ?>"></td>
                                    </tr>
                                    <?php
                                $urn_type = $urn . "_diploma";
                                $diploma_data_query = "SELECT * FROM earliar_education WHERE urn_type = '$urn_type'";
                                // print($ssc_data_query);
                                $res = $con->query($diploma_data_query);
                                $diploma_data = $res->fetch_assoc();
                                if (!$diploma_data) {
                                    $diploma_data =$default_education;
                                }
                                ?>
                                <tr>
                                    <th scope="row">Diploma</th>
                                    <td>

                                        <input type="number" placeholder="YYYY" name="diploma_year" class="form-control" id="diploma_year" min="2015" maxlength="4">
                                    </td>
                                    <td><input type="number" name="diploma_marks" placeholder="Percentage" class="form-control" id="diploma_marks" maxlength="12"></td>
                                    <td><input type="text" name="diploma_medium" placeholder="Medium" class="form-control" id="diploma_medium"></td>
                                    <td><input type="text" name="diploma_place" placeholder="Place" class="form-control" id="diploma_place">
                                    </td>
                                </tr>
                                <?php
                                $urn_type = $urn . "_other";
                                $other_data_query = "SELECT * FROM earliar_education WHERE urn_type = '$urn_type'";
                                // print($ssc_data_query);
                                $res = $con->query($other_data_query);
                                $other_data = $res->fetch_assoc();
                                if (!$other_data) {
                                    $other_data =$default_education;
                                }
                                ?>
                                <tr>
                                    <th scope="row">Other</th>
                                    <td>

                                        <input type="number" placeholder="YYYY" name="year_of_admission" class="form-control" id="year_of_admission" min="2015" maxlength="4">
                                    </td>
                                    <td><input type="number" name="other_marks" placeholder="Percentage" class="form-control" id="other_marks" maxlength="12"></td>
                                    <td><input type="text" name="other_medium" placeholder="Medium" class="form-control" id="other_medium">
                                    </td>
                                    <td><input type="text" name="other_place" placeholder="Place" class="form-control" id="other_place">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile row">
                    <div class="col-md-12">
                        <h2>Problems Facing<h2>
                    </div>
                    <div style="overflow:auto">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="3">Problems </th>
                                    <th scope="col" colspan="2">F.Y. B.Tech</th>
                                    <th scope="col" colspan="2">S.Y. B.Tech</th>
                                    <th scope="col" colspan="2">T.Y. B.Tech</th>
                                    <th scope="col" colspan="2">B.Tech</th>
                                </tr>
                                <tr>
                                    <th scope="col">Mild(1)</th>
                                    <th scope="col">Moderate(2)</th>
                                    <th scope="col">Severe(3)</th>
                                    <th scope="col">Sem 1</th>
                                    <th scope="col">Sem 2</th>
                                    <th scope="col">Sem 3</th>
                                    <th scope="col">Sem 4</th>
                                    <th scope="col">Sem 5</th>
                                    <th scope="col">Sem 6</th>
                                    <th scope="col">Sem 7</th>
                                    <th scope="col">Sem 8</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" colspan="3">
                                        Does not understand the Subject
                                    </th>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td><select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="3">Exam Fear</th>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>fghftrtur6u7ufgfhrghsfsaaaFaFfwgehethyryuk jguyko869t
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="3">Communication Skills</th>
                                    <td>

                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row" colspan="3">Feels Depressed /Anxious/Angry</th>
                                    <td>

                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="3">Addiction</th>
                                    <td>

                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row" colspan="3">Confidence Level</th>
                                    <td>

                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="3">Procrastination(Delay in Studies)</th>
                                    <td>

                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="3">Stage Daring</th>
                                    <td>

                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                    <td>
                                        <select class="form-select" name="rate">
                                            <option selected>None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="3">Attendance(%)</th>
                                    <td>
                                        <input type="number" name="roll_no" class="form-control" id="roll_no" maxlength="4">
                                    </td>
                                    <td>
                                        <input type="number" name="roll_no" class="form-control" id="roll_no" maxlength="4">
                                    </td>
                                    <td>
                                        <input type="number" name="roll_no" class="form-control" id="roll_no" maxlength="4">
                                    </td>
                                    <td>
                                        <input type="number" name="roll_no" class="form-control" id="roll_no" maxlength="4">
                                    </td>
                                    <td>
                                        <input type="number" name="roll_no" class="form-control" id="roll_no" maxlength="4">
                                    </td>
                                    <td>
                                        <input type="number" name="roll_no" class="form-control" id="roll_no" maxlength="4">
                                    </td>
                                    <td>
                                        <input type="number" name="roll_no" class="form-control" id="roll_no" maxlength="4">
                                    </td>
                                    <td>
                                        <input type="number" name="roll_no" class="form-control" id="roll_no" maxlength="4">
                                    </td>
                                </tr>

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile row">
                    <div class="col-md-12">
                        <h2>Academic Performance<h2>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-outline-primary" id="fybtn">F.Y.B.Tech</button>
                        <button class="btn btn-outline-primary" id="sybtn">S.Y.B.Tech</button>
                        <button class="btn btn-outline-primary" id="tybtn">T.Y.B.Tech</button>
                        <button class="btn btn-outline-primary" id="btechbtn">B.Tech</button>
                    </div>
                    <div class="col-md-12" id="fy"></div>
                    <div class="col-md-12" id="sy"></div>
                    <div class="col-md-12" id="ty"></div>
                    <div class="col-md-12" id="btech"></div>


                </div>
            </div>
        </div>
        </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile row">
                    <div class="col-md-12">
                        <h2>Suggestions/Actions taken by the Counsellors <h2>
                    </div>
                    <div style="overflow:auto">
                        <table class="table table-bordered">
                            <thead>
                                <th scope="row" colspan="3">
                                    <center>Suggestions</center>
                                </th>
                                <th scope="row">Initials of Counsellors</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col" rowspan="2">F.Y. B.Tech</th>
                                    <th scope="col">
                                        Sem 1
                                        </td>
                                    <td>
                                        <textarea id="sem1_suggestions" name="sem1_suggestions" rows="4" class="txtarea"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" name="sem1_initials" class="form-control" id="sem1_initials">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">
                                        Sem 2
                                        </td>
                                    <td>
                                        <textarea id="sem2_suggestions" name="sem2_suggestions" rows="4" class="txtarea"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" name="sem2_initials" class="form-control" id="sem2_initials">
                                    </td>
                                </tr>


                                <tr>
                                    <th scope="col" rowspan="2">S.Y. B.Tech</th>
                                    <th scope="col">
                                        Sem 3
                                        </td>
                                    <td>
                                        <textarea id="sem3_suggestions" name="sem3_suggestions" rows="4" class="txtarea"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" name="sem3_initials" class="form-control" id="sem3_initials">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">
                                        Sem 4
                                        </td>
                                    <td>
                                        <textarea id="sem4_suggestions" name="sem4_suggestions" rows="4" class="txtarea"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" name="sem4_initials" class="form-control" id="sem4_initials">
                                    </td>
                                </tr>


                                <tr>
                                    <th scope="col" rowspan="2">T.Y. B.Tech</th>
                                    <th scope="col">
                                        Sem 5
                                        </td>
                                    <td>
                                        <textarea id="sem5_suggestions" name="sem5_suggestions" rows="4" class="txtarea"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" name="sem5_initials" class="form-control" id="sem5_initials">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">
                                        Sem 6
                                        </td>
                                    <td>
                                        <textarea id="sem6_suggestions" name="sem6_suggestions" rows="4" class="txtarea"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" name="sem6_initials" class="form-control" id="sem6_initials">
                                    </td>
                                </tr>


                                <tr>
                                    <th scope="col" rowspan="2">B.Tech</th>
                                    <th scope="col">
                                        Sem 7
                                        </td>
                                    <td>
                                        <textarea id="sem7_suggestions" name="sem7_suggestions" rows="4" class="txtarea"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" name="sem7_initials" class="form-control" id="sem7_initials">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">
                                        Sem 8
                                        </td>
                                    <td>
                                        <textarea id="sem8_suggestions" name="sem8_suggestions" rows="4" class="txtarea"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" name="sem8_initials" class="form-control" id="sem8_initials">
                                    </td>
                                </tr>
                            </tbody>
                    </div>
                </div>
            </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
        let ids = ["fy", "sy", "ty", "btech"];

        for (let i in ids) {
            document.getElementById(ids[i]).innerHTML = getTable(i * 2 + 1);
        }

        hideAll();

        document.getElementById("fybtn").addEventListener("click", () => {
            hideAll();
            document.getElementById("fy").style.display = "block";
        })
        document.getElementById("sybtn").addEventListener("click", () => {
            hideAll();
            document.getElementById("sy").style.display = "block";
        })
        document.getElementById("tybtn").addEventListener("click", () => {
            hideAll();
            document.getElementById("ty").style.display = "block";
        })
        document.getElementById("btechbtn").addEventListener("click", () => {
            hideAll();
            document.getElementById("btech").style.display = "block";
        })

        function hideAll() {
            for (let id of ids) {
                document.getElementById(id).style.display = "none";
            }
        }

        function getTable(number) {
            return `
      
      <div class="row mt-5">
    <div class="col-md-12">
      <div class="tile row">
        <div class="col-md-12">
          <div style="overflow:auto">
            <table class="table table-bordered" >
              <thead>
                <tr>
                  <th scope="row" rowspan="2">Name of Subject(Sem-${number})
                  </th>
                  <th scope="row" colspan="3">Internal Test Marks</th>
                  <th scope="row" rowspan="2">ESE</th>
                  <th scope="row" rowspan="2">Grade</th>

                </tr>
                <tr>
                  <td scope="row">ISE-1</td>
                  <td scope="row">MSE</td>
                  <td scope="row">ISE-2</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">
                    <input type="text" name="sem1_sub1" class="form-control" id="sem1_sub1">
                  </th>
                  <td>
                    <input type="number" name="ise1_sem1_sub1" class="form-control" id="ise1_sem1_sub1">
                  </td>
                  <td>
                    <input type="number" name="mse_sem1_sub1" class="form-control" id="mse_sem1_sub1">
                  </td>
                  <td>
                    <input type="number" name="ise2_sem1_sub1" class="form-control" id="ise2_sem1_sub1">
                  </td>
                  <td>
                    <input type="number" name="ese_sem1_sub1" class="form-control" id="ese_sem1_sub1">
                  </td>
                  <td>
                    <input type="number" name="grade_sem1_sub1" class="form-control" id="grade_sem1_sub1">
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    <input type="text" name="sem1_sub2" class="form-control" id="sem1_sub2">
                  </th>
                  <td>
                    <input type="number" name="ise1_sem1_sub2" class="form-control" id="ise1_sem1_sub2">
                  </td>
                  <td>
                    <input type="number" name="mse_sem1_sub2" class="form-control" id="mse_sem1_sub2">
                  </td>
                  <td>
                    <input type="number" name="ise2_sem1_sub2" class="form-control" id="ise2_sem1_sub2">
                  </td>
                  <td>
                    <input type="number" name="ese_sem1_sub2" class="form-control" id="ese_sem1_sub2">
                  </td>
                  <td>
                    <input type="number" name="grade_sem1_sub2" class="form-control" id="grade_sem1_sub2">
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    <input type="text" name="sem1_sub3" class="form-control" id="sem1_sub3">
                  </th>
                  <td>
                    <input type="number" name="ise1_sem1_sub3" class="form-control" id="ise1_sem1_sub3">
                  </td>
                  <td>
                    <input type="number" name="mse_sem1_sub3" class="form-control" id="mse_sem1_sub3">
                  </td>
                  <td>
                    <input type="number" name="ise2_sem1_sub3" class="form-control" id="ise2_sem1_sub3">
                  </td>
                  <td>
                    <input type="number" name="ese_sem1_sub3" class="form-control" id="ese_sem1_sub3">
                  </td>
                  <td>
                    <input type="number" name="grade_sem1_sub3" class="form-control" id="grade_sem1_sub3">
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    <input type="text" name="sem1_sub4" class="form-control" id="sem1_sub4">
                  </th>
                  <td>
                    <input type="number" name="ise1_sem1_sub4" class="form-control" id="ise1_sem1_sub4">
                  </td>
                  <td>
                    <input type="number" name="mse_sem1_sub4" class="form-control" id="mse_sem1_sub4">
                  </td>
                  <td>
                    <input type="number" name="ise2_sem1_sub4" class="form-control" id="ise2_sem1_sub4">
                  </td>
                  <td>
                    <input type="number" name="ese_sem1_sub4" class="form-control" id="ese_sem1_sub4">
                  </td>
                  <td>
                    <input type="number" name="grade_sem1_sub4" class="form-control" id="grade_sem1_sub4">
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    <input type="text" name="sem1_sub5" class="form-control" id="sem1_sub5">
                  </th>
                  <td>
                    <input type="number" name="ise1_sem1_sub5" class="form-control" id="ise1_sem1_sub5">
                  </td>
                  <td>
                    <input type="number" name="mse_sem1_sub5" class="form-control" id="mse_sem1_sub5">
                  </td>
                  <td>
                    <input type="number" name="ise2_sem1_sub5" class="form-control" id="ise2_sem1_sub5">
                  </td>
                  <td>
                    <input type="number" name="ese_sem1_sub5" class="form-control" id="ese_sem1_sub5">
                  </td>
                  <td>
                    <input type="number" name="grade_sem1_sub5" class="form-control" id="grade_sem1_sub5">
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    <input type="text" name="sem1_sub6" class="form-control" id="sem1_sub6">
                  </th>
                  <td>
                    <input type="number" name="ise1_sem1_sub6" class="form-control" id="ise1_sem1_sub6">
                  </td>
                  <td>
                    <input type="number" name="mse_sem1_sub6" class="form-control" id="mse_sem1_sub6">
                  </td>
                  <td>
                    <input type="number" name="ise2_sem1_sub6" class="form-control" id="ise2_sem1_sub6">
                  </td>
                  <td>
                    <input type="number" name="ese_sem1_sub6" class="form-control" id="ese_sem1_sub6">
                  </td>
                  <td>
                    <input type="number" name="grade_sem1_sub6" class="form-control" id="grade_sem1_sub6">
                  </td>
                </tr>
              </tbody>
            </table>
            <p></p>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" rowspan="2">Name of Subject(Sem-${number + 1})
                  </th>
                  <th scope="col" colspan="3">Internal Test Marks</th>
                  <th scope="col" rowspan="2">ESE</th>
                  <th scope="col" rowspan="2">Grade</th>

                </tr>
                <tr>
                  <th scope="col">ISE-1</td>
                  <th scope="col">MSE</td>
                  <th scope="col">ISE-2</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">
                    <input type="text" name="sem2_sub1" class="form-control" id="sem2_sub1">
                  </th>
                  <td>
                    <input type="number" name="ise1_sem2_sub1" class="form-control" id="ise1_sem2_sub1">
                  </td>
                  <td>
                    <input type="number" name="mse_sem2_sub1" class="form-control" id="mse_sem2_sub1">
                  </td>
                  <td>
                    <input type="number" name="ise2_sem2_sub1" class="form-control" id="ise2_sem2_sub1">
                  </td>
                  <td>
                    <input type="number" name="ese_sem2_sub1" class="form-control" id="ese_sem2_sub1">
                  </td>
                  <td>
                    <input type="number" name="grade_sem2_sub1" class="form-control" id="grade_sem2_sub1">
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    <input type="text" name="sem2_sub2" class="form-control" id="sem2_sub2">
                  </th>
                  <td>
                    <input type="number" name="ise1_sem2_sub2" class="form-control" id="ise1_sem2_sub2">
                  </td>
                  <td>
                    <input type="number" name="mse_sem2_sub2" class="form-control" id="mse_sem2_sub2">
                  </td>
                  <td>
                    <input type="number" name="ise2_sem2_sub2" class="form-control" id="ise2_sem2_sub2">
                  </td>
                  <td>
                    <input type="number" name="ese_sem2_sub2" class="form-control" id="ese_sem2_sub2">
                  </td>
                  <td>
                    <input type="number" name="grade_sem2_sub2" class="form-control" id="grade_sem2_sub2">
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    <input type="text" name="sem2_sub3" class="form-control" id="sem2_sub3">
                  </th>
                  <td>
                    <input type="number" name="ise1_sem2_sub3" class="form-control" id="ise1_sem2_sub3">
                  </td>
                  <td>
                    <input type="number" name="mse_sem2_sub3" class="form-control" id="mse_sem2_sub3">
                  </td>
                  <td>
                    <input type="number" name="ise2_sem2_sub3" class="form-control" id="ise2_sem2_sub3">
                  </td>
                  <td>
                    <input type="number" name="ese_sem2_sub3" class="form-control" id="ese_sem2_sub3">
                  </td>
                  <td>
                    <input type="number" name="grade_sem2_sub3" class="form-control" id="grade_sem2_sub3">
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    <input type="text" name="sem2_sub4" class="form-control" id="sem2_sub4">
                  </th>
                  <td>
                    <input type="number" name="ise1_sem2_sub4" class="form-control" id="ise1_sem2_sub4">
                  </td>
                  <td>
                    <input type="number" name="mse_sem2_sub4" class="form-control" id="mse_sem2_sub4">
                  </td>
                  <td>
                    <input type="number" name="ise2_sem2_sub4" class="form-control" id="ise2_sem2_sub4">
                  </td>
                  <td>
                    <input type="number" name="ese_sem2_sub4" class="form-control" id="ese_sem2_sub4">
                  </td>
                  <td>
                    <input type="number" name="grade_sem2_sub4" class="form-control" id="grade_sem2_sub4">
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    <input type="text" name="sem2_sub5" class="form-control" id="sem2_sub5">
                  </th>
                  <td>
                    <input type="number" name="ise1_sem2_sub5" class="form-control" id="ise1_sem2_sub5">
                  </td>
                  <td>
                    <input type="number" name="mse_sem2_sub5" class="form-control" id="mse_sem2_sub5">
                  </td>
                  <td>
                    <input type="number" name="ise2_sem2_sub5" class="form-control" id="ise2_sem2_sub5">
                  </td>
                  <td>
                    <input type="number" name="ese_sem2_sub5" class="form-control" id="ese_sem2_sub5">
                  </td>
                  <td>
                    <input type="number" name="grade_sem2_sub5" class="form-control" id="grade_sem2_sub5">
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    <input type="text" name="sem2_sub6" class="form-control" id="sem2_sub6">
                  </th>
                  <td>
                    <input type="number" name="ise1_sem2_sub6" class="form-control" id="ise1_sem2_sub6">
                  </td>
                  <td>
                    <input type="number" name="mse_sem2_sub6" class="form-control" id="mse_sem2_sub6">
                  </td>
                  <td>
                    <input type="number" name="ise2_sem2_sub6" class="form-control" id="ise2_sem2_sub6">
                  </td>
                  <td>
                    <input type="number" name="ese_sem2_sub6" class="form-control" id="ese_sem2_sub6">
                  </td>
                  <td>
                    <input type="number" name="grade_sem2_sub6" class="form-control" id="grade_sem2_sub6">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
`
        }
    </script>


</body>

</html>