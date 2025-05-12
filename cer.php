<?php
session_start();
include("config.php");

if (!isset($_SESSION['regno'])) {
    header("Location: regno.php");
    exit();
}
$regno = mysqli_real_escape_string($conn, $_SESSION['regno']);
$sql = "SELECT m.*, r.*
        FROM marksheet m 
        JOIN result r ON m.resultid = r.id 
        WHERE m.regno = '$regno'";

$result = mysqli_query($conn, $sql);
$marks = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $marks[] = $row;
        if (!isset($student)) {
    $student = [
        'studentname' => $row['studentname'],
        'regno' => $row['regno'],
        'semester' => $row['semester'],
        'coursename' => $row['coursename'],
        'session' => $row['session'],
        'resultpublishdate' => $row['resultpublishdate']
    ];
}

    }
} else {
    $error = "No record found for this roll number.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Sheet - Bharath University</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        @page {
            size: A4;
            margin: 10mm;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f9f9f9;
            font-size: 12px;
        }

        .container {
            max-width: 210mm;
            margin: 20px auto;

            background: white;
            padding: 10px;
            border: 1px solid #1a3e72;
            border-radius: 5px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            border-bottom: 2px solid #1a3e72;
            padding-bottom: 10px;
        }

        .logo {
            height: 40px;
            margin-right: 15px;
        }

        .header-text h1 {
            color: #1a3e72;
            margin: 0;
            font-size: 18px;
        }

        .header-text h2 {
            color: #2a5a9c;
            margin: 3px 0 0;
            font-size: 14px;
        }

        .student-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 10px;
        }

        .info-box {
            background-color: #f0f5ff;
            padding: 8px;
            border-radius: 3px;
            border-left: 3px solid #2a5a9c;
            border: 1px solid #d1d9e6;
        }

        .info-box h3 {
            margin-top: 0;
            color: #1a3e72;
            font-size: 14px;
        }

        .info-box p {
            margin: 3px 0;
            font-size: 13px;
        }

        .marks-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            font-size: 10px;
            border: 1px solid #d1d9e6;
        }

        .marks-table th {
            background-color: #1a3e72;
            color: white;
            padding: 5px;
            text-align: left;
            font-weight: 500;
            border: 1px solid #1a3e72;
            font-size: 14px;
        }

        .marks-table td {
            padding: 4px;
            border-bottom: 1px solid #e0e0e0;
            border-right: 1px solid #e0e0e0;
            font-size: 13px;
        }

        .marks-table tr:nth-child(even) {
            background-color: #f8faff;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin-top: 10px;
        }

        .summary-card {
            background-color: #e6efff;
            padding: 8px;
            border-radius: 3px;
            text-align: center;
            border: 1px solid #d1d9e6;
        }

        .summary-card h3 {
            margin: 0 0 3px;
            color: #1a3e72;
            font-size: 13px;
        }

        .summary-card p {
            margin: 0;
            font-weight: bold;
            font-size: 14px;
        }

        .instructions {
            margin-top: 5mm;
            font-size: 9pt;
            border: 1px solid #000;
            padding: 3mm;
        }

        .instructions h4 {
            margin-top: 0;
            margin-bottom: 2mm;
            text-decoration: underline;
            font-weight: bold;
            font-size: 15px;
        }

        .instructions ul {
            margin: 0;
            padding-left: 5mm;
        }

        .signature-section {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 15px;
            text-align: center;
            font-size: 13px;
        }

        .sign {
            margin: 2px;
            padding: 2px
        }

        .signature-box {
            padding: 5px;
        }

        .signature-line {
            border-top: 1px solid #333;
            margin-top: 25px;
            padding-top: 3px;
        }

        .footer {
            text-align: center;
            margin-top: 10px;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #e0e0e0;
            padding-top: 5px;
        }

        .grade-O {
            color: #2e7d32;
            font-weight: bold;
        }

        .grade-Aplus {
            color: #ef6c00;
            font-weight: bold;
        }

        .grade-A {
            color: #c62828;
            font-weight: bold;
        }

        .grade-Bplus {
            color: #6a1b9a;
            font-weight: bold;
        }

        .grade-B {
            color: #1565c0;
            font-weight: bold;
        }

        .grade-C {
            color: #5e35b1;
            font-weight: bold;
        }

        .grade-P {
            color: #2e7d32;
            font-weight: bold;
        }

        .grade-F {
            color: #c62828;
            font-weight: bold;
        }

        .print-button {
            text-align: center;
            margin-top: 10px;
        }

        .print-button button {
            background-color: #1a3e72;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 12px;
        }

        /* @media print { */
        /* body {
                padding: 0;
                background: none;
            }
            .container {
                box-shadow: none;
                padding: 5mm;
                border: none;
            }
            .print-button {
                display: none;
            }
            .marks-table {
                font-size: 9pt;
            }
        } */
        /* @media (max-width: 768px) {
            .student-info {
                grid-template-columns: 1fr;
            }
            .summary {
                grid-template-columns: 1fr;
            }
            .signature-section {
                grid-template-columns: 1fr;
                gap: 0px;
            }
            .header {
                flex-direction: column;
                text-align: center;
            }
            .logo {
                margin-right: 0;
                margin-bottom: 5px;
            }
        } */
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="https://www.bharathuniv.ac.in/result/img/logo.png" alt="Bharath University Logo" class="logo">
            <div class="header-text">
                <h1>BHARATH UNIVERSITY</h1>
                <h2>CONSOLIDATED STATEMENT OF MARKS</h2>
            </div>
        </div>

        <div class="student-info">
            <div class="info-box">
                <h3>STUDENT INFORMATION</h3>
                <p><strong>Name: </strong> <?php echo $student['studentname'] ?></p>
                <p><strong>Reg No:</strong> <?php echo $student['regno'] ?></p>
                <p><strong>Semester:</strong> <?php echo $student['semester'] ?></p>
            </div>
            <div class="info-box">
                <h3>ACADEMIC DETAILS</h3>
                <p><strong>Course:</strong> <?php echo $student['coursename'] ?></p>
                <p><strong>Session:</strong> <?php echo $student['session'] ?></p>
                <p><strong>Result Publish Date:</strong> <?php echo $student['resultpublishdate'] ?></p>
            </div>
        </div>

        <table class="marks-table">
            <thead>
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Max</th>
                    <th>Mark</th>
                    <!-- <th>Grade</th> -->
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("config.php");
                $totalMarks = 0;
                $maxMarks = 0;

                $query = "SELECT * FROM marksheet WHERE regno='$regno'";
                $query_check = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_check) > 0) {
                    while ($row = mysqli_fetch_assoc($query_check)) {
                        $totalMarks += $row['digitmarks'];
                        $maxMarks += $row['fullmarks'];
                        $percentage = ($totalMarks / $maxMarks) * 100;
                ?>
                        <tr>
                            <td><?php echo $row['subjectcode'] ?></td>

                            <td><?php echo $row['subjectname'] ?></td>
                            <td><?php echo $row['digitmarks'] ?></td>
                            <td><?php echo $row['fullmarks'] ?></td>
                            <td>
                                <span class="text-green-600 font-bold"><?php echo $row['status'] ?></span>
                            </td>
                        </tr>
                <?php   }
                    if ($maxMarks > 0) {
                        $percentage = ($totalMarks / $maxMarks) * 100;
                    } else {
                        $percentage = 0;
                    }
                    function getGrade($percentage)
                    {
                        if ($percentage >= 90) return 'A+';
                        elseif ($percentage >= 80) return 'A';
                        elseif ($percentage >= 70) return 'B';
                        elseif ($percentage >= 60) return 'C';
                        elseif ($percentage >= 50) return 'D';
                        elseif ($percentage >= 40) return 'E';
                        else return 'F';
                    }
                    function getGradePoint($percentage)
                    {
                        if ($percentage >= 90) return 10;
                        elseif ($percentage >= 80) return 9;
                        elseif ($percentage >= 70) return 8;
                        elseif ($percentage >= 60) return 7;
                        elseif ($percentage >= 50) return 6;
                        elseif ($percentage >= 40) return 5;
                        else return 0;
                    }

                    $getGrade = getGrade($percentage);
                    $getCgpa = getGradePoint($percentage);
                }
                ?>
            </tbody>
        </table>

        <div class="summary">
            <div class="summary-card">
                <h3>Grade</h3>
                <p><?php echo $getGrade; ?></p>
            </div>
            <div class="summary-card">
                <h3>TOTAL MARKS</h3>
                <p><?php echo $totalMarks; ?>/<?php echo $maxMarks; ?></p>
            </div>
            <div class="summary-card">
                <h3>CGPA</h3>
                <p class="grade-P"><?php echo $getCgpa; ?></p>
            </div>
            <div class="summary-card">
                <h3>percentage</h3>
                <p><?php echo "$percentage%"; ?></p>
            </div>
        </div>

        <div class="signature-section">
            <div class="signature-box">
                <p class="sign">Prepared by</p>
                <img src="signature.png" style="height: 10mm;" alt="">
                <p>Exam Coordinator</p>
            </div>
            <div class="signature-box">
                <p class="sign">Verified by</p>
                <img src="signature2.png" style="height: 10mm;" alt="">
                <p>Head of Department</p>
            </div>
            <div class="signature-box">

                <p class="sign">Approved by</p>
                <img src="signature3.png" style="height: 10mm;" alt="">

                <p>Controller of Examinations</p>
            </div>
        </div>
        <div class="instructions">
            <h4>IMPORTANT INSTRUCTIONS:</h4>
            <ul>
                <li>This is an original grade card issued by the University. Duplicates can be obtained only from the Examination Branch with proper authorization.</li>
                <li>The grades are awarded based on the following scale: O (90-100), A+ (80-89), A (70-79), B+ (60-69), B (50-59), C (40-49), F (Below 40)</li>
                <li>SGPA is calculated as the weighted average of grade points obtained in all courses.</li>
                <li>Any discrepancy in this grade card should be reported to the Controller of Examinations within 15 days.</li>
                <li>This document should be preserved carefully. A fee of ₹1000 will be charged for issuing a duplicate grade card.</li>
            </ul>
        </div>
        <div class="footer">
            <p>Controller of Examinations, Bharath University</p>
            <p>173, Agharam Road, Selaiyur, Chennai - 600 073, Tamil Nadu, India</p>
        </div>
        <div class="print-button text-center">
            <button onclick="window.print()">Print Mark Sheet</button>
        </div>

    </div>

</body>

</html>