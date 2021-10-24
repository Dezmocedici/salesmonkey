<!DOCTYPE html>
<html lang="en">
<?php
define("permit", TRUE);
include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");
?>


<body>
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="card-wrapper">
                <div class="card shadow-lg mb-2 border-0 content-card" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
                    <div class="card-body">
                        <div id="root">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/footer.inc.php")?>
    <script src="./assets/js/react-email-editor.js"></script>
    <script src="./assets/js/email-builder.js"></script>
    <script>
        $(function() {
            $("a.nav-link.sidebar-link").removeClass("nav-active");
            $("a[href*='builder.php']").addClass("nav-active");
        });
    </script>
</body>

</html>