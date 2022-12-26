<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php 
    class Alert{

        public static function success($message){
            echo '<script>swal("Good job!", "'.$message.'", "success");</script>';
        }

        public static function warning($message){
            echo '<script>swal("Aww Snap!", "'.$message.'", "warning");</script>';
        }
        public static function info($message){
            echo '<script>swal("Information", "'.$message.'", "info");</script>';
        }
    }
?>