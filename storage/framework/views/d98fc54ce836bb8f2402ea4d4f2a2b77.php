<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
  
.nonsfs-container {
    width: 1000px;
    margin: 50px auto;
    padding: 20px;
    /* background-color: #E8F1FA; */
    background-color: white;
    border: 1px solid #C8D8E4;
}

.nonsfs-header {
    background-color: #99B3D7;
    padding: 10px;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: bold;
    font-size: 16px;
}

.nonsfs-file-no-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
}

.nonsfs-file-no-section label {
    font-weight: bold;
    margin-right: 10px;

}

.nonsfs-file-no-section input {
    width: 50%;
    padding: 5px;
    border: 1px solid #999;
    background-color: #f0f0f0;
    color: #000;
}

.nonsfs-menu {
    /* background-color: #D3E4F3; */
    padding: 10px;
    display: flex;
    justify-content: space-between;
    border-top: 2px solid #99B3D7;
    border-bottom: 2px solid #99B3D7;
}

.nonsfs-menu-item {
    padding: 5px 15px;
    cursor: pointer;
    color: #000;
}

.nonsfs-menu-item:hover {
    background-color: #B5C9E0;
}

.nonsfs-details-section {
    margin-top: 20px;
    display: grid;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    

}

.nonsfs-details-section1 {
    margin-top: 20px;
    display: grid;
    justify-content: space-between;
    gap: 10px;
    margin-left: 500px;
    margin-top: -140px;
    

}

.nonsfs-details-row label {
    font-weight: bold;
    margin-right: 10px;

}

.nonsfs-details-row input {
    width: 300px;
    padding: 5px;
    /* border: 1px solid #999; */
    border: none;
    /* background-color: #f0f0f0; */
    color: #000;
    font-size: 15px;
   
    
}


.nonsfs-footer {
    
    background-color: #99B3D7;
    padding: 10px;
    text-align: center;
    color:white;
    font-size: 19px;
    margin-top: 20px;
}

.history-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    border: 1px solid #C8D8E4;
}

.history-table th, .history-table td {
    padding: 10px;
    text-align: left;
    border: 1px solid #C8D8E4;
}

.history-table th {
    background-color: #99B3D7;
    color: #fff;
}

.history-table td {
    background-color: white;
}
 #a1{
    margin-left: 5px;
    
}

#b1{
    margin-left: 40px;
} 
#c1{
    margin-left: -5px;
}
#d1{
    margin-left:-10px;
}
/* second */
#a{
    margin-left: 13px;
}
#c{
    margin-left: 15px;
}
#d{
    margin-left: 50px;
}


</style>

<div class="nonsfs-container">
    <div class="nonsfs-header">
        <span>File No.: <span class="nonsfs-file-no">T-11011/1/2012-LF</span></span>
    </div>

    <div class="nonsfs-menu">
        <div class="nonsfs-menu-item">Correspondence</div>
        <div class="nonsfs-menu-item">Link and Delink</div>
        <div class="nonsfs-menu-item">Movements</div>
        <div class="nonsfs-menu-item">Details</div>
        <div class="nonsfs-menu-item">Edit</div>
        <div class="nonsfs-menu-item">Send</div>
        <div class="nonsfs-menu-item">Dispatch</div>
        <div class="nonsfs-menu-item">More Action</div>
        <div class="nonsfs-menu-item">Create Volume</div>
        <div class="nonsfs-menu-item">Convert File</div>
        <div class="nonsfs-menu-item">Merge</div>
    </div>

    <!-- File Number and Subject -->
    <div class="nonsfs-details-section">
        <div class="nonsfs-details-row">
            <label>File Number:</label>
            <input type="text" id="a1" value="T-11011/1/2012-LF" disabled>
        </div>
        <div class="nonsfs-details-row">
            <label>Subject:</label>
            <input type="text" id="b1" value="Training on Foundation" disabled>
        </div>
        <div class="nonsfs-details-row">
            <label>Opening Date:</label>
            <input type="text" id="c1" value="14/06/12 02:29" disabled>
        </div>
        <div class="nonsfs-details-row">
            <label>Main Category:</label>
            <input type="text" id="d1" value="Training related matters" disabled>
        </div>
        
    </div>
     <!-- second -->
    <div class="nonsfs-details-section1">
        
        <div class="nonsfs-details-row">
            <label> Pre Reference:</label>
            <input type="text" id="a" value="Training on Foundation" disabled>
        </div>
        <div class="nonsfs-details-row">
            <label>Later Reference:</label>
            <input type="text" id="b" value="14/06/12 02:29" disabled>
        </div>
        <div class="nonsfs-details-row">
            <label>Sub Category:</label>
            <input type="text" id="c" value="Training related matters" disabled>
        </div>
        <div class="nonsfs-details-row">
            <label>Remarks:</label>
            <input type="text" id="d" value="Proceed to next step" disabled>
        </div>
    </div> 

    <!-- Table Section -->
    <table class="history-table">
        <thead>
            <tr>
                <th>Sender</th>
                <th>Sent On</th>
                <th>Action</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>01/01/2023</td>
                <td>Approved</td>
                <td>Proceed with the next step</td>
            </tr>
            <tr>
                <td>Jane Doe</td>
                <td>02/01/2023</td>
                <td>Reviewed</td>
                <td>No issues found</td>
            </tr>
        </tbody>
    </table>

    <div class="nonsfs-footer">
        File Movement History
    </div>
</div>
 <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/js/pages/crm-customer-list.init.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/file/electronic/sfs-continueworking.blade.php ENDPATH**/ ?>