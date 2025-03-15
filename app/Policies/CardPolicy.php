<?php

namespace App\Policies;

use App\Models\Card;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CardPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Card $card): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create card');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Card $card): bool
    {
        return $user->can('edit card');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Card $card): bool
    {
        return $user->can('delete card');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Card $card): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Card $card): bool
    {
        return false;
    }

    public function reserve(User $user, Card $card):bool{
        foreach($user->cards as $u_card){
            if($u_card->tier != "Découverte"){
                //l'utilisateur à déjà un abo en cours de validité 
                //--> ne laisse pas la possibilté d'être vendeur et client, à changer ?
                if($u_card->subscription->end > date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))))
                    return False;
            }
            else{
                //l'utilisateur à déjà réservé un abo Découverte
                if($card->tier == "Découverte")
                    return False;
            }
        }
        return True;
    }

    public function before(User $user){
        if($user->hasRole('admin'))
            return true;
    }
}
