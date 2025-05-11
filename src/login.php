

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
  </head>
  <body>
      <header>
          <a href="/login">Login</a>
          <a href="/register">Register</a>
      </header>
      <h1>Register</h1>
      <form action="/login" method="POST">
          <div>
              <label>Username</label>
              <input type="text" name="username" id="username">
          </div>
          <div>
              <label>Mot de passe</label>
              <input type="text" name="password" id="password">
          </div>
          <div>
              <button type="submit">Login</button>
          </div>
      </form>
  </body>
</html>
