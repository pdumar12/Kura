<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo base_url(); ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo lang('login'); ?> - <?php echo $this->db->get('settings')->row()->system_vendor; ?></title>

  <!-- Google Font: Poppins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="adminlte/plugins/flag-icon-css/css/flag-icon.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">

  <style>
    body.login-page {
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
      font-family: 'Poppins', sans-serif;
    }

    .header-image {
      text-align: center;
      padding: 20px;
      background: linear-gradient(to right, #6f42c1, #9b59b6);
    }

    .header-image img {
      max-width: 200px;
      border-radius: 10px;
    }

    .login-box {
      animation: fadeIn 1s ease-in-out;
    }

    .card {
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
      background: #ffffffee;
    }

    .login-logo a {
      color: #6f42c1;
      font-weight: bold;
      font-size: 24px;
    }

    .btn-primary {
      background-color: #6f42c1;
      border-color: #6f42c1;
    }

    .btn-primary:hover {
      background-color: #563d7c;
      border-color: #563d7c;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body class="hold-transition login-page">

  <!-- Imagen de la empresa -->
  <div class="header-image">
    <img src="ruta/de/tu/logo.png" alt="Logo Empresa">
  </div>

  <!-- Selector de idioma (igual que antes) -->
  <?php
  $flags = [
    'arabic' => 'sa',
    'english' => 'us',
    'spanish' => 'es',
    'french' => 'fr',
    'italian' => 'it',
    'portuguese' => 'pt',
    'turkish' => 'tr'
  ];
  $flagIcon = $flags[$this->language] ?? 'us';
  ?>
  <ul class="navbar-nav ml-auto mr-3" style="position: fixed; top: 0; right: 0;">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="">
        <button type="button" class="btn btn-block btn-default btn-lg">
          <span class="ml-2 text-lg mr-2" style="text-transform: capitalize;"><?php echo $this->language; ?></span>
          <span class="fas fa-angle-down text-primary"></span>
        </button>
      </a>
      <div class="dropdown-menu dropdown-menu-right p-0">
        <?php foreach ($flags as $lang => $flag) : ?>
          <a href="frontend/changeLanguageFlag?lang=<?php echo $lang; ?>" class="dropdown-item <?php if ($this->language == $lang) echo 'active'; ?>">
            <i class="flag-icon flag-icon-<?php echo $flag; ?> mr-2"></i> <?php echo ucfirst($lang); ?>
          </a>
        <?php endforeach; ?>
      </div>
    </li>
  </ul>

  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b><?php echo $this->db->get('settings')->row()->title; ?></b></a>
    </div>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg"><?php echo lang('Sign in to start your session') ?></p>

        <?php if (!empty($message)) : ?>
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title"><?php echo $message; ?></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <form method="post" action="auth/login">
          <div class="input-group mb-3">
            <input type="email" name="identity" class="form-control form-control-lg" placeholder="<?php echo lang('email') ?>">
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control form-control-lg" placeholder="<?php echo lang('password') ?>">
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-lg btn-block"><?php echo lang('sign_in') ?></button>
            </div>
          </div>
        </form>

        <p class="mb-0 text-center">
          <a data-toggle="modal" href="#myModal"><?php echo lang('forgot_your_password') ?>?</a>
        </p>
      </div>
    </div>
  </div>

  <!-- Modal recuperar contraseña -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="auth/forgot_password">
          <div class="modal-header">
            <h4 class="modal-title"><?php echo lang('forgot_your_password') ?> ?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <p><?php echo lang('enter_your_email_address_to_reset_your_password') ?></p>
            <input type="text" name="email" class="form-control" placeholder="<?php echo lang('email') ?>" autocomplete="off">
          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-warning" type="button"><?php echo lang('cancel') ?></button>
            <input class="btn btn-primary" type="submit" name="submit" value="<?php echo lang('submit') ?>">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="adminlte/plugins/jquery/jquery.min.js"></script>
  <script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>
