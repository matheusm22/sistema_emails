<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="download.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css
">

  <style>
    #entrar {
      width: 29%;
      padding-left: 20px;
    }

    #res {
      position: relative;
      justify-content: center;
      font-size: 20px;
      padding-left: 50px;
      margin-top: 18px;
    }

    #mostrar {
      margin-left: 200px;
      position: relative;
      bottom: 35px;
      right: 15px;
      width: 30px;
      height: 30px;
     

    }
  </style>
  <title>Login</title>
</head>

<body>

  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="econet.webp" class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form action="funclogin.php" method="POST">
            <h3>Jaqueline</h3>
            <br>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" id="usuario" class="form-control w-50" name="user" />
              <label class="form-label" for="form1Example13">Usuário</label>
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4 form-login">
              <input type="password" id="senha" name="senha" class="form-control w-50" />
              <label class="form-label" for="form1Example23">Senha</label>
              <img src="eye.svg" id='mostrar'>

              <br>
              <div id="res">
              </div>
            </div>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-outline-success w-25" name="submit" id="entrar" onclick="carregar()">Login</button>
        </form>
      </div>
    </div>
    </div>
  </section>
</body>
<script src="script.js"></script>

</html>