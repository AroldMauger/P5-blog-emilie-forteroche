<h2>Edition des commentaires </h2>
<div class="title-comment-page">
    <h3><?= $article->getTitle() ?></h3>
</div>
<?php if (empty($comments)): ?>
        <span class="no-comments">Aucun commentaire sur cet article pour le moment</span>
    <?php else: ?>
<div class="adminArticle">

    <table class="monitoring-table">
        <thead>
        <tr>
            <th>PSEUDO</th>
            <th>CONTENU</th>
            <th>DATE</th>
            <th>ACTION</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($comments as $comment) { ?>
            <tr>
                <td><?= $comment->getPseudo() ?></td>
                <td><?= $comment->getContent() ?></td>
                <td><?= $comment->getDateCreation()->format('d/m/Y') ?></td>
                <td class="edit-btn">
                    <a href="?action=deleteComment&id=<?=$comment->getId()?>&articleId=<?=$article->getId()?>" class="edit-comments-btn" onClick="return confirmDelete(event)"> 
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
<script>
function confirmDelete(event) {
    event.preventDefault();
    if (confirm("Êtes-vous sûr de vouloir supprimer ce commentaire ?")) {
        window.location.href = event.target.closest('a').href;
    }
    return false;
}
</script>