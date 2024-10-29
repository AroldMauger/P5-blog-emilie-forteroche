<?php
/**
 * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun.
 * Et un formulaire pour ajouter un article.
 */
?>

<h2>Edition des articles</h2>

<div class="adminArticle">
    <table class="monitoring-table">
        <thead>
        <tr>
            <th>TITRE</th>
            <th>DESCRIPTION</th>
            <th>ACTION 1</th>
            <th>ACTION 2</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $article) { ?>
            <tr>
                <td><?= $article->getTitle() ?></td>
                <td><?= $article->getContent(200) ?></td>
                <td>
                    <a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $article->getId() ?>">Modifier</a>
                </td>
                <td>
                    <a class="submit" href="index.php?action=deleteArticle&id=<?= $article->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?>>Supprimer</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>