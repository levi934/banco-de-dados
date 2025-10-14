<?php include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];

  $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

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
  <title>Editar Usuário</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Editar Usuário</h2>
    <form method="POST">
      <label>Nome:</label>
      <input type="text" name="name" value="<?= $user['name'] ?>" required>

      <label>Email:</label>
      <input type="email" name="email" value="<?= $user['email'] ?>" required>

      <button type="submit" class="btn">Atualizar</button>
      <a href="index.php" class="btn-back">Voltar</a>
    </form>
  </div>

  <footer>
    <p>Desenvolvido por <strong>Leví Yago</strong> e <strong>Daiana</strong></p>
  </footer>
</body>
</html>
