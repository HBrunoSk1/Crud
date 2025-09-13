<?php
include "db.php";
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    echo "<div class='alert alert-danger'>ID inválido.</div>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $stmt = $conn->prepare("UPDATE contatos SET nome=?, email=?, telefone=? WHERE id=?");
    $stmt->bind_param("sssi", $nome, $email, $telefone, $id);
    if ($stmt->execute()) {
        header("Location: home.php?msg=editado");
        exit;
    } else {
        $erro = "Erro ao atualizar o contato.";
    }
}

$stmt = $conn->prepare("SELECT * FROM contatos WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "<div class='alert alert-danger'>Contato não encontrado.</div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Contato</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2>Editar Contato</h2>
  <?php if (isset($erro)): ?>
    <div class="alert alert-danger"><?= $erro ?></div>
  <?php endif; ?>
  <form method="post" class="card p-4 shadow-sm">
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($row['nome']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($row['email']) ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Telefone</label>
      <input type="text" name="telefone" class="form-control" value="<?= htmlspecialchars($row['telefone']) ?>">
    </div>
    <button type="submit" class="btn btn-warning">Atualizar</button>
    <a href="home.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
