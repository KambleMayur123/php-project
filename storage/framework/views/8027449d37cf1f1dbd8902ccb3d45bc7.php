
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equal Divs with Header</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>

.header {
    background-color: #abddf3;
    border-bottom: 2px solid #910da7;
    width: 67%; /* Reduce the header width */
   margin-left:300px;
   margin-top:100px;
}

.header-options { 
      background-color: #abddf3;
    list-style-type: none;
    display: flex;
    
    margin: 0;
}

.header-options li {
    padding: 10px 20px;
    cursor: pointer;
    font-weight: bold;
    /*background-color: #e0e0e0;*/
    /*border: 1px solid #ddd;*/
    text-align: center;
    /*width: 180px;*/
}

.header-options li:hover {
    background-color: #cfcfcf;
}

.container {
    display: flex;
    height: calc(100vh - 50px); /* Full height minus the header */
    width: 60%; /* Reduce the width of the container */
    /* Align the container to the right */
    max-width: 1200px; /* Add a maximum width for large screens */
}
.left-div{
      margin-left: 100px !important;
}

.left-div, .right-div {
    flex: 1;
    padding: 20px;
    border: 4px solid #910da7;
    border-top: none; /* Remove only the top border */
   
}

.left-div {
    border-right: 4px solid #910da7;
}

.right-div {
    display: flex;
    flex-direction: column;
    margin-left:20px;
    justify-content: flex-start;
}

.right-div h3 {
    margin-bottom: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

thead th {
    background-color: #f2f2f2;
    text-align: left;
    padding: 8px;
    font-weight: bold;
    border-bottom: 1px solid #ddd;
}

tbody td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.delete-btn, .edit-btn {
    background-color: #ff0000;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    font-size: 12px;
    margin-right: 5px;
}

.edit-btn {
    background-color: #00aaff;
}

.save-btn {
    background-color: #ccc;
    border: none;
    padding: 10px 20px;
    cursor: not-allowed;
    color: #555;
}

@media screen and (max-width: 768px) {
    .container {
        flex-direction: column;
        width: 100%;
    }

    .left-div, .right-div {
        width: 100%;
        border-right: none;
        border-bottom: 2px solid #800080;
    }

    .header-options {
        flex-direction: column;
    }

    .header-options li {
        text-align: center;
        width: auto;
    }
}
@media screen and (max-width: 768px) {
    .container {
        flex-direction: column;
        width: 100%; /* Make container full width */
    }

    .left-div, .right-div {
        width: 100%;
        border-right: none;
        border-bottom: 2px solid #800080; /* Keep the border style */
        margin-left: 0; /* Remove margin for mobile */
    }

    .header {
        width: 100%; /* Full-width header on mobile */
        margin-left: 0;
        margin-top: 0;
    }

    .header-options {
        flex-direction: column; /* Stack options vertically */
        text-align: center;
        padding: 0;
    }

    .header-options li {
        width: 100%; /* Make list items take full width */
        padding: 10px 0; /* Adjust padding for better touch experience */
    }

    table, thead, tbody, th, td, tr {
        display: block; /* Ensure table behaves well on small screens */
    }

    thead {
        display: none; /* Hide table header on small screens */
    }

    tr {
        margin-bottom: 10px;
    }

    td {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    td:before {
        content: attr(data-label);
        font-weight: bold;
        flex-basis: 50%;
        text-align: left;
    }

    .save-btn {
        width: 100%; /* Make the save button full-width */
        margin-top: 10px;
    }
}

</style>
<body>

    <div class="header">
        <ul class="header-options">
           <li><a href="./nothing">Notings</a></li>
            <li><a href="/correspondance">Correspondences</a></li>
            <li><a href="/reference">References</a></li>
            <li><a href="./edit">Edit</a></li>
           <li><a href="./finalize">Finalize Migration</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="left-div">
            <!-- Left side empty section or content goes here -->
        </div>

        <div class="right-div">
            <h3>edit</h3>
            <!--<table>-->
            <!--    <thead>-->
            <!--        <tr>-->
            <!--            <th>Sl No</th>-->
            <!--            <th>Correspondence No</th>-->
            <!--            <th>Subject</th>-->
            <!--            <th>Type</th>-->
            <!--            <th>Sent By</th>-->
            <!--            <th>Actions</th>-->
            <!--        </tr>-->
            <!--    </thead>-->
            <!--    <tbody>-->
            <!--        <tr>-->
            <!--            <td>1</td>-->
            <!--            <td>localhost.pdf</td>-->
            <!--            <td>N/A</td>-->
            <!--            <td>Issue</td>-->
            <!--            <td>N/A</td>-->
            <!--            <td>-->
            <!--                <button class="delete-btn">X</button>-->
            <!--                <button class="edit-btn">✏️</button>-->
            <!--            </td>-->
            <!--        </tr>-->
            <!--    </tbody>-->
            <!--</table>-->
            <!--<button class="save-btn">Save Sequence</button>-->
        </div>
    </div>

</body>
</html>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/migrate-file/edit.blade.php ENDPATH**/ ?>