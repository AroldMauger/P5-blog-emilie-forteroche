<h2>Commentaires et vues des articles</h2>

<div class="adminArticle">
    <table class="monitoring-table">
        <thead>
        <tr>
            <th>
                <a href="?action=monitoring&sort=title&order=<?= $order === 'asc' ? 'desc' : 'asc' ?>">
                    TITRE <?= $sort === 'title' ? ($order === 'asc' ? '▲' : '▼') : '' ?>
                </a>
            </th>
            <th class="monitoring-content">
                <a href="?action=monitoring&sort=views&order=<?= $order === 'asc' ? 'desc' : 'asc' ?>">
                    VUES <?= $sort === 'views' ? ($order === 'asc' ? '▲' : '▼') : '' ?>
                </a>
            </th>
            <th class="monitoring-content">
                <a href="?action=monitoring&sort=comments&order=<?= $order === 'asc' ? 'desc' : 'asc' ?>">
                    COMMENTAIRES <?= $sort === 'comments' ? ($order === 'asc' ? '▲' : '▼') : '' ?>
                </a>
            </th>
            <th class="monitoring-content">
                <a href="?action=monitoring&sort=date&order=<?= $order === 'asc' ? 'desc' : 'asc' ?>">
                    DATE DE PUBLICATION <?= $sort === 'date' ? ($order === 'asc' ? '▲' : '▼') : '' ?>
                </a>
            </th>
            <th>
                <a>ACTION </a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $article) { ?>
            <tr>
                <td class="title-content"><?= htmlspecialchars($article['title']) ?></td>
                <td class="monitoring-content"><?= $article['views'] ?></td>
                <td><?= $article['comments'] ?></td>
                <td><?= date('d/m/Y', $article['date']) ?></td>
                <td class="edit-btn">
                    <a href="?action=comments&id=<?=$article['id']?>" class="edit-comments-btn">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span>  commentaires</span>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

