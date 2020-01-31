<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
echo "<script>alert('berhasil logout');window.location = 'login.html';</script>";
?>

</body>
</html> 