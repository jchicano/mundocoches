<!-- Bootstrap core JavaScript -->
<?php if ($CURRENT_PAGE == "Index") { ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php }
	else { ?>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php
	}
?>


<!-- Plugin JavaScript -->
<?php if ($CURRENT_PAGE == "Index") { ?>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<?php }
	else { ?>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<?php
	}
?>


<!-- Custom scripts for this template -->
<?php if ($CURRENT_PAGE == "Index") { ?>
    <script src="js/grayscale.min.js"></script>
<?php }
	else { ?>
    <script src="../js/grayscale.min.js"></script>
<?php
	}
?>


<!-- Más scripts de Boilerplate -->
<?php if ($CURRENT_PAGE == "Index") { ?>
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
    <script src="js/plugins.js"></script>
<?php }
	else { ?>
    <script src="../js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
    <script src="../js/plugins.js"></script>
<?php
	}
?>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>