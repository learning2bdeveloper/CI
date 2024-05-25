<link rel="stylesheet" href="<?= base_url("assets/css/navigationbar.css") ?>">

<style>
    .custom-sidebar-link .lni {
        font-size: 24px;
        /* Adjust the font size as needed */
        margin-right: 10px;
        /* Optional: Add some space between the icon and the text */
    }
</style>

<?php
$key = $this->session->uniqueKey;
$sessionData = $this->session->client_session[$key]; ?>

<aside id="custom-sidebar"> <!-- Change the ID to avoid conflicts -->
    <div class="d-flex">

        <div class="custom-sidebar-logo"> <!-- Change class names -->
            <a href>
                <?= $sessionData["first_name"] . " " . $sessionData["last_name"]; ?>
            </a>
        </div>
    </div>
    <ul class="custom-sidebar-nav"> <!-- Change class names -->
        <li class="custom-sidebar-item"> <!-- Change class names -->
            <a class="custom-sidebar-link" id="client_dashboard">
                <i class="lni lni-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="custom-sidebar-item"> <!-- Change class names -->
            <a class="custom-sidebar-link" id="client_view_organizations">
                <i class="lni lni-apartment"></i>
                <span>View Organizations</span>
            </a>
        </li>
        <li class="custom-sidebar-item"> <!-- Change class names -->
            <a class="custom-sidebar-link" id="client_profile">
                <i class="lni lni-user"></i>
                <span>Profile Settings</span>
            </a>
        </li>
    </ul>
    <div class="custom-sidebar-footer"> <!-- Change class names -->
        <a class="custom-sidebar-link" id="client_logout">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
    </div>

    <script src="<?= base_url("assets/javascript/Sidebarnavigation.js") ?>"></script>
</aside>