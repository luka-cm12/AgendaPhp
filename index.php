<?php
    include_once("templates/header.php");
?>
   <div class="container">
   <p id="msg">Testando mensagem</p>
        <?php if(isset($printmsg) && $printmsg != ""): ?> 
            <p id="msg"><?= $printmsg ?></p>
        <?php endif; ?>
        <h1 id="main-tittle">Minha Agenda</h1>
        <?php if(count($contacts > 0)): ?>
            <table class="table" id="contacts-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach($contacts ): ?>
                        <td>
                            <td scope="row" class="col-id"><?=$contact["id"] ?></td>
                            <td scope="row"><?=$contact["name"] ?></td>
                            <td scope="row"><?=$contact["phone"] ?></td>
                            <td class="actions"></td>
                                <a href="<?= $BASE_URL ?>show.php?id=<?=$contact["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
                                <a href="<?= $BASE_URL ?>edit.php?id=<?=$contact["id"] ?>"><i class="fas fa-edit edit-icon"></i></a>
                                <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $contacts["id"] ?>">
                                    <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p id="empy-list-text">Ainda não há contatos na agenda, <a href="<?= $BASE_URL ?>create.php">clique aqui para adicionar</a>.</p>
        <?php endif; ?>
   </div>
<?php
    include_once("templates/footer.php");
?>