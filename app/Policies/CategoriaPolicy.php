<?php

namespace App\Policies;

use App\Models\Categoria;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->tipo !== 'Cliente';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function view(User $user, Categoria $categoria)
    {

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function update(User $user, Categoria $categoria)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function delete(User $user, Categoria $categoria)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function restore(User $user, Categoria $categoria)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categoria  $categoria
     * @return mixed
     */
    public function forceDelete(User $user, Categoria $categoria)
    {
        //
    }
}
