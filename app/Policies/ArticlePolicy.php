<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Article $article)
    {
        return $user->id === $article->user_id || $user->isAdmin();
    }

    public function delete(User $user, Article $article)
    {
        return $user->id === $article->user_id || $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isJournalist();
    }
}
