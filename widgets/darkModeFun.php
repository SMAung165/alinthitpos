<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style type="text/css">
    .card {
        border-radius: 10px;
    }

    .form-control:disabled,
    .form-control[readonly] {
        cursor: not-allowed;
    }

    /* Darkmode Button */

    .mode-switch-btn {

        position: fixed;
        top: 90%;
        left: 98%;

        transform: translateX(-100%);

        z-index: 1;
    }

    .mode-switch-btn button {

        width: 40px;
        height: 40px;

        background: #464646;

        display: flex;
        justify-content: center;
        align-items: center;

        box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);

        padding: 20px;
        border: none;
        border-radius: 50%;

        cursor: pointer;

    }

    .mode-switch-btn button:hover {
        background: #666666;
    }

    .mode-switch-btn button span {

        font-size: 1rem;
        line-height: 40px;
    }
</style>

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
        }

        .form-control:disabled,
        .form-control[readonly] {
            background: #303030 !important;

            cursor: not-allowed;
        }

        table tr,
        table td {

            background: inherit !important;

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

        .dt-button,
        .dt-button-info {

            background: #464646 !important;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);

        }

        .dt-button-info h2 {

            background: inherit !important;

        }

        .user-work h4,
        .user-skill h4 {
            border-bottom: 1px solid rgba(255, 255, 255, 0.5) !important;
        }
    </style>
<?php } ?>