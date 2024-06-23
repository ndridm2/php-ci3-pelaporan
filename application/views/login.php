<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/login/style.css" />
    <title>Pelaporan Kinerja Guru</title>
  </head>

  <body>
    <div class="container" id="container">
			<!-- register -->
      <div class="form-container sign-up">
        <form method="post" action="<?= base_url('Auth/afterRegis'); ?>">
          <h1>Create Account</h1>
          <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
          </div>
          <span>or use your intput form for registeration</span>
					<span><?= $this->session->flashdata('message'); ?></span>

					<input type="hidden" name="id_user" />
          <input type="num" placeholder="NIP" name="" />
					<?= form_error('nip', '<div class="text-danger small ml-2">', '</div>'); ?>

          <input type="text" placeholder="Nama" name="" />
					<?= form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>

          <input type="password" placeholder="Password" name="" />
					<?= form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>

          <button type="submit">Sign Up</button>
        </form>
      </div>
			<!-- login -->
      <div class="form-container sign-in">
        <form method="POST" action="<?= base_url('Auth'); ?>">
          <h1>Sign In</h1>
          <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"
              ><i class="fa-brands fa-linkedin-in"></i
            ></a>
          </div>
          <!-- <span>or use your email password</span> -->
		  <span><?= $this->session->flashdata('message'); ?></span>
          <input type="text" placeholder="Masukkan Nama" id="username" name="username" value="<?= set_value('username'); ?>"/>
          <input type="password" placeholder="Password" id="password" placeholder="Masukkan Password" name="password" />
          <i class="eye-icon fa-regular fa-eye-slash" id="togglePassword"></i>
          <a href="#">Forget Your Password?</a>
          <button type="submit" id="signin">Sign In</button>
        </form>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <h1>Welcome Back!</h1>
            <p>Enter your personal details to use all of site features</p>
            <button class="hidden" id="login">Sign In</button>
          </div>
          <div class="toggle-panel toggle-right">
            <h1>Hello, Friend!</h1>
            <p>
              Register with your personal details to use all of site features
            </p>
            <button class="hidden" id="register">Sign Up</button>
          </div>
        </div>
      </div>
    </div>

    <script src="<?= base_url(); ?>assets/login/script.js"></script>
    <script>
      const passwordInput = document.getElementById("password");
      const togglePassword = document.getElementById("togglePassword");

      togglePassword.addEventListener("click", function () {
        if (passwordInput.type === "password") {
          passwordInput.type = "text";
          togglePassword.classList.add("show-password");
        } else {
          passwordInput.type = "password";
          togglePassword.classList.remove("show-password");
        }
      });
    </script>
  </body>
</html>
