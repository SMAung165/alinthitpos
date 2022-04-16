<?php
if ($sessionUserDarkMode == 1) { ?>
    <style type='text/css'>
        * {
            color: white !important;
            border-color: #363636 !important;
        }

        body {

            background: #262626 !important;
        }

        .header {
            background: transparent !important;
            box-shadow: none !important;
        }

        .header .hamburger .line {
            background: white !important;
        }

        .drop-down {
            background: #363636 !important;
        }

        .drop-down li:hover {
            background: #464646 !important;
        }

        .notification-unread {
            background: #464646 !important;
        }

        .sidebar .nano-content ul li a,
        .sidebar,
        .logo {
            background: #363636 !important;
        }

        .sidebar .nano-content ul li a:hover {
            background: rgba(0, 255, 255, 0.5) !important;
        }

        input,
        textarea,
        select {

            background: #464646 !important;

        }

        .card {
            background: #363636 !important;
            border-radius: 10px;
        }


        thead,
        tfoot {
            background: #222222 !important;
        }

        .odd {
            background: #2e2e2e !important;
        }

        .even {
            background: #464646 !important;
        }

        .dtr-control {
            background-color: inherit !important;
        }

        .dt-button {

            background: #464646 !important;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);

        }
    </style>
<?php } ?>