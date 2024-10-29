<?php
/**
 * Affichage de la partie monitoring pour l'administrateur :
 */
?>
<h2>Commentaires et vues des articles</h2>

<div class="adminArticle">
    <table class="monitoring-table">
        <thead>
        <tr>
            <th>TITRE</th>
            <th>VUES</th>
            <th>COMMENTAIRES</th>
            <th>DATE DE PUBLICATION</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $article) { ?>
            <tr>
                <td><?= $article->getTitle() ?></td>
                <td><?= $article->getViews() ?></td>
                <td><?= count($articleComments[$article->getId()]) ?></td>
                <td><?= $article->getDateCreation()->format('d/m/Y') ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>