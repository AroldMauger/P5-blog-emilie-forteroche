<?php

class CommentController 
{
    /**
     * Ajoute un commentaire.
     * @return void
     */
    public function addComment() : void
    {
        // Récupération des données du formulaire.
        $pseudo = Utils::request("pseudo");
        $content = Utils::request("content");
        $idArticle = Utils::request("idArticle");

        // On vérifie que les données sont valides.
        if (empty($pseudo) || empty($content) || empty($idArticle)) {
            throw new Exception("Tous les champs sont obligatoires. 3");
        }

        // On vérifie que l'article existe.
        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($idArticle);
        if (!$article) {
            throw new Exception("L'article demandé n'existe pas.");
        }

        // On crée l'objet Comment.
        $comment = new Comment([
            'pseudo' => $pseudo,
            'content' => $content,
            'idArticle' => $idArticle
        ]);

        // On ajoute le commentaire.
        $commentManager = new CommentManager();
        $result = $commentManager->addComment($comment);

        // On vérifie que l'ajout a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de l'ajout du commentaire.");
        }

        // On redirige vers la page de l'article.
        Utils::redirect("showArticle", ['id' => $idArticle]);
    }


    public function showCommentsByArticle() {
        $id = Utils::request("id", -1);

        if ($id == -1) {
            Utils::redirect("monitoring");
            return;
        }

        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($id);

        if (!$article) {
            // Redirection vers la page de monitoring
            Utils::redirect("monitoring");
            return;
        }
        $commentManager = new CommentManager();
        $comments = $commentManager->getAllCommentsByArticleId($id);

        $view = new View("comments");
        $view->render("comments", [
            'comments' => $comments,
            'article' => $article
        ]);
    }


    public function deleteComment() {
        $id = Utils::request("id", -1);
        $articleId = Utils::request("articleId", -1);

        $commentManager = new CommentManager();
        $comment = $commentManager->getCommentById($id);

        if (!$comment) {
            Utils::redirect("comments&id=" . $articleId);
            return;
        }

        $result = $commentManager->deleteComment($comment);
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de la suppression du commentaire.");
        }
        Utils::redirect("comments&id=" . $articleId);
    }
}