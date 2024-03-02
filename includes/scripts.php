        
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/scripts.js"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="assets/vendor/chart.js/Chart.min.js"></script>
        <script src="assets/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#myTable').DataTable();
                });
        </script>
        
        <script src="assets/js/sweetalert.min.js"></script>
        <?php
            if (isset($_SESSION['status']) && $_SESSION['status'] != '') 
            {
        ?>
        <script>
            swal({
            title: "<?php echo $_SESSION['status']; ?>",
            //text:"You clicked the button!",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "OK",
            });
        </script>

        <?php
        unset($_SESSION['status']);
        }
        ?>
        <script src="assets/js/custom.js"></script>
        
</html>