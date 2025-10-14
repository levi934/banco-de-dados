<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>CRUD PHP - Listar Usuários</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Lista de Usuários</h2>
    <a href="create.php" class="btn">+ Adicionar Usuário</a>

    <table>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
      </tr>

      <?php
      $sql = "SELECT * FROM users ORDER BY id DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['email']}</td>
                  <td>
                    <a href='update.php?id={$row['id']}' class='btn-edit'>Editar</a>
                    <a href='delete.php?id={$row['id']}' class='btn-delete' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>
                  </td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='4'>Nenhum usuário cadastrado.</td></tr>";
      }
      ?>
    </table>
  </div>

  <footer>
    <p>Desenvolvido por <strong>Leví Yago</strong> e <strong>Daiana</strong></p>
  </footer>
</body>
</html>
