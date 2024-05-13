<?php usefulLinks(); ?>
<link rel="stylesheet" href="<?= base_url("assets/css/Organization_index.css") ?>">
<script defer src="<?= base_url('assets/javascript/Organization.js') ?>"></script>

<body>
    <div class="cont">
        <div class="form sign-in">
            <h2>Welcome</h2>
            <label>
                <form method="post" id="form_login">
                    <span>Username</span>
                    <input type="text" name="login_username" id="login_username" />
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="login_pwd" id="login_pwd" />
            </label>
            <p class="forgot-pass">Forgot password?</p>
            <button type="submit" class="submit">Sign In</button>
            </form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">

                    <h3>Don't have an account? Please Sign up!<h3>
                </div>
                <div class="img__text m--in">

                    <h3>If you already has an account, just sign in.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Create your Account</h2>
                <label for="organizations" class="dropdown-label">Choose an organization:</label>
                <span class="dropdown-wrapper">
                    <form method="post" id="form_signup">
                        <select name="organizationsdropdown" id="organizationsdropdown" class="dropdown-select">
                            <?php
                            if (!empty($data)) {
                                foreach ($data as $value) {  ?>
                                    <option value="<?= $value->OrgID; ?>"> <?= $value->OrgName; ?></option>
                                <?php  }
                            } else { ?>
                                <option>No Records!</option>
                            <?php } ?>
                        </select>
                </span>
                <label>
                    <span>Department</span>
                    <input type="text" name="department" id="department" />
                </label>
                <label>
                    <span>Username</span>
                    <input type="text" name="username" id="username" />
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="pwd" id="pwd" />
                </label>
                <button type="submit" class="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</body>