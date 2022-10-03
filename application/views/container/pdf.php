<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title_pdf;?></title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center; background-color: green; color:white">
            <h3><?= $title_pdf;?></h3>
        </div>
        <table class='table'>
            <tbody>
                <tr>
                    <td>Container Number</td>
                    <td>: <?= $data_container->Container_no?></td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>: <?= $data_container->Size ?></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>: <?= $data_container->Type ?></td>
                </tr>
                <tr>
                    <td>Gate In</td>
                    <td>: <?= $data_container->Gate_In ?></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>