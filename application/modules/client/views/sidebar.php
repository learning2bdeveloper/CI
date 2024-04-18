<link rel="stylesheet" href="<?= base_url("assets/css/navigationbar.css") ?>">

<style>
    .profile-image {
        width: 40px;
        /* Adjust the width as needed */
        height: 40px;
        /* Adjust the height as needed */
        border-radius: 50%;
        /* Make the image circular */
    }
</style>
<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <img src="<?= base_url("assets/images/profiles/6602bfd9833aa6.51694611.jpg") ?>" class="profile-image">
        </button>
        <div class="sidebar-logo">
            <a href="#"><?= $this->session->userdata('first_name') . " " . $this->session->userdata('last_name'); ?></a>

        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="Upload" class="sidebar-link">
                <i class="lni lni-home"></i>
                <span>Upload Documents</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="Landingpage" class="sidebar-link">
                <i class="lni lni-apartment"></i>
                <span>View Organizations</span>
            </a>
        </li>
        <li class="sidebar-item">

            <a href="#" class="sidebar-link">

                <i class="lni lni-user"></i>
                <span>Profile Settings</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a class="sidebar-link" id="client_logout">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
    </div>

    <script src="<?= base_url("assets/javascript/sidebarnavigation.js") ?>"></script>

</aside>