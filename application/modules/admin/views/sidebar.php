<link rel="stylesheet" href="<?= base_url("assets/css/navigationbar.css") ?>">

<style>
    .custom-sidebar-link .lni {
        font-size: 24px;
        /* Adjust the font size as needed */
        margin-right: 10px;
        /* Optional: Add some space between the icon and the text */
    }
</style>

<aside id="custom-sidebar"> <!-- Change the ID to avoid conflicts -->
    <div class="d-flex">

        <div class="custom-sidebar-logo"> <!-- Change class names -->
            <a href>
                ADMIN
            </a>
        </div>
    </div>
    <ul class="custom-sidebar-nav"> <!-- Change class names -->
        <li class="custom-sidebar-item"> <!-- Change class names -->
            <a class="custom-sidebar-link" id="admin_dashboard">
                <i class="lni lni-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="custom-sidebar-item"> <!-- Change class names -->
            <a class="custom-sidebar-link" id="admin_view_organization">
                <i class="lni lni-apartment"></i>
                <span>Organizations</span>
            </a>
        </li>
        <li class="custom-sidebar-item"> <!-- Change class names -->
            <a class="custom-sidebar-link" id="admin_client">
                <i class="lni lni-user"></i>
                <span>Clients</span>
            </a>
        </li>
    </ul>

    <script src="<?= base_url("assets/javascript/sidebarnavigation.js") ?>"></script>
</aside>