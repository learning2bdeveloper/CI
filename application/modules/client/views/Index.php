<?= usefulLinks(); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/client_homepage.css') ?>">
<script defer src="<?= base_url('/assets/javascript/Client.js') ?>"></script>

<body>

    <section class="wrapper">
        <div class="form signup">
            <header>Signup</header>
            <form id="form_signup">
                <input type="text" placeholder="First name" name="firstName" id="firstName" required />
                <input type="text" placeholder="Middle name" name="middleName" id="middleName" required />
                <input type="text" placeholder="Last name" name="lastName" id="lastName" required />
                <input type="email" placeholder="Email address" name="email" id="email" required />
                <input type="password" placeholder="Password" name="pwd" id="pwd" required />
                <div class="checkbox">
                    <input type="checkbox" id="checkbox" name="checkbox" />
                    <label for="signupCheck">I accept all terms & conditions</label>
                </div>
                <input type="submit" value="Signup" />
            </form>
        </div>
        <div class="form login">
            <header>Login</header>
            <form id="form_login">
                <input type="text" placeholder="Email address" name="login_email" id="login_email" required />
                <input type="password" placeholder="Password" name="login_pwd" id="login_pwd" required />
                <a href="#">Forgot password?</a>
                <input type="submit" value="Login" />
            </form>
        </div>
        <script>
            const wrapper = document.querySelector(".wrapper"),
                signupHeader = document.querySelector(".signup header"),
                loginHeader = document.querySelector(".login header");
            loginHeader.addEventListener("click", () => {
                wrapper.classList.add("active");
            });
            signupHeader.addEventListener("click", () => {
                wrapper.classList.remove("active");
            });
        </script>
    </section>
</body>

</html>