<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> © E-Office.
            </div>
        </div>
    </div>

    <!-- Include SweetAlert2 Library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Check if there is a success message in the session
        <?php if(session('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "<?php echo e(session('success')); ?>",
                confirmButtonText: 'OK'
            });
        <?php endif; ?>
    </script>
</footer>
<?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/layouts/footer.blade.php ENDPATH**/ ?>