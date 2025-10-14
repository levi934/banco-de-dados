<?php include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];

  $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
  if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit;
  } else {
    echo "Erro: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Adicionar Usuário</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Adicionar Usuário</h2>
    <form method="POST">
      <label>Nome:</label>
      <input type="text" name="name" required>

      <label>Email:</label>
      <input type="email" name="email" required>

      <button type="submit" class="btn">Salvar</button>
      <a href="index.php" class="btn-back">Voltar</a>
    </form>
  </div>

  <footer>
    <p>Desenvolvido por <strong>Leví Yago</strong> e <strong>Daiana</strong></p>
  </footer>
</body>
</html>
