<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jquery-3.4.1.min.js"></script>
    <script lang="javascript" src="sheetjs-master/dist/xlsx.full.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/exceljs/dist/exceljs.min.js"></script>
    <script src="jquery-ui.js"></script>
    <script src="jquery.json.min.js"></script>

    <link rel="stylesheet" type="text/css" href="node_modules/DataTables/datatables.min.css" />

    <script type="text/javascript" src="node_modules/DataTables/datatables.min.js"></script>

    <link href="node_modules/tableexport/dist/css/tableexport.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <style>
        #nxt {

            text-decoration: none;
            display: inline-block;
            padding: 7.5px 14px;
            outline: none;
            border: none;
            font-size: 16px;
            margin-left: 30px;
        }

        #nxt:hover {
            background-color: #ddd;
            color: black;
        }

        .next {
            background-color: rgb(72, 75, 117);
            color: white;
            border-radius: 10px;
            float: right;

        }


        .content .tbSize {
            width: 95%;
            height: 450px;
            overflow: auto;
        }

        .cover .up {
            height: 10%;
            width: 100%;
            background-color: rgba(219, 219, 219, 0.712);
            padding-top: 1%;
            padding-bottom: 1%;
            padding-left: 4%;
            font-size: larger;
            font-weight: bold;
        }

        .cover .content {
            height: 90%;
            width: 100%;
            padding-top: 2%;
            padding-left: 5%;
        }

        .cover {
            width: max-width;
            height: max-heigth;
        }

        #rawFile th {
            font-size: medium;
            font-weight: 500;
        }

        .forButton {
            float: right;
            padding: 3% 4.8%;
        }

    </style>
    <title>Non-Duplicated Data</title>
</head>

<body>
    <div class="cover">
        <div class="up">Non-Skiptraced Data</div>
        <div class="content">
            <div class="tbSize table-responsive">
                <table id="rawFile" class="table table-bordered">
                    <thead id="headData">
                        <th>
                            LIST_NAME
                        </th>
                        <th>
                            FIRST_NAME
                        </th>
                        <th>
                            LAST_NAME
                        </th>
                        <th>
                            ADDRESS
                        </th>
                        <th>
                            CITY
                        </th>
                        <th>
                            STATE
                        </th>
                        <th>
                            ZIP_CODE
                        </th>
                        <th>
                            MAILING_ADDRESS
                        </th>
                        <th>
                            MAILING_CITY
                        </th>
                        <th>
                            MAILING_STATE
                        </th>
                        <th>
                            MAILING_ZIP
                        </th>
                        <th>
                            PHONE_1
                        </th>
                        <th>
                            PHONE_1_TYPE
                        </th>
                        <th>
                            PHONE_2
                        </th>
                        <th>
                            PHONE_2_TYPE
                        </th>
                        <th>
                            PHONE_3
                        </th>
                        <th>
                            PHONE_3_TYPE
                        </th>
                        <th>
                            PHONE_4
                        </th>
                        <th>
                            PHONE_4_TYPE
                        </th>
                        <th>
                            PHONE_5
                        </th>
                        <th>
                            PHONE_5_TYPE
                        </th>
                        <th>
                            PHONE_6
                        </th>
                        <th>
                            PHONE_6_TYPE
                        </th>
                        <th>
                            PHONE_7
                        </th>
                        <th>
                            PHONE_7_TYPE
                        </th>
                        <th>
                            PHONE_8
                        </th>
                        <th>
                            PHONE_8_TYPE
                        </th>
                        <th>
                            PHONE_9
                        </th>
                        <th>
                            PHONE_9_TYPE
                        </th>
                        <th>
                            PHONE_10
                        </th>
                        <th>
                            PHONE_10_TYPE
                        </th>

                    </thead>
                    <tbody id="BodyData">
                        <?php
                        include("config.php");
                        $sql = "SELECT * From raw_data";
                        if ($result = $conn->query($sql)) {

                            while ($row = $result->fetch_row()) {
                                echo "<tr><td>$row[0]</td>
                                <td>$row[1]</td>
                                <td>$row[2]</td>
                                <td>$row[3]</td>
                                <td>$row[4]</td>
                                <td>$row[5]</td>
                                <td>$row[6]</td>
                                <td>$row[7]</td>
                                <td>$row[8]</td>
                                <td>$row[9]</td>
                                <td>$row[10]</td>
                                <td>$row[11]</td>
                                <td>$row[12]</td>
                                <td>$row[13]</td>
                                <td>$row[14]</td>
                                <td>$row[15]</td>
                                <td>$row[16]</td>
                                <td>$row[17]</td>
                                <td>$row[18]</td>
                                <td>$row[19]</td>
                                <td>$row[20]</td>
                                <td>$row[21]</td>
                                <td>$row[22]</td>
                                <td>$row[23]</td>
                                <td>$row[24]</td>
                                <td>$row[25]</td>
                                <td>$row[26]</td>
                                <td>$row[27]</td>
                                <td>$row[28]</td>
                                <td>$row[29]</td>
                                <td>$row[30]</td>
                                </tr>";
                            }
                            $result->free_result();
                        } else {
                            echo "Error!";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="forButton">
           
            <button id="nxt" class="next" onclick="window.location='nonDulpi.php';">For other Tables &raquo;</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#rawFile').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
        });
    </script>
</body>

</html>