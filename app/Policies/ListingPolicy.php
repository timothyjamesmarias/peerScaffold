<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response as AccessResponse;

class ListingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //users can view all listings
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Listing $listing)
    {
        //users can view all listings
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //all users whose accounts are active may create listings
        return !($user->trashed()) ? AccessResponse::allow() : AccessResponse::deny();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Listing $listing)
    {
        //check that listing belongs to user
        if ($user->id === $listing->user_id) {
            //if the user is deleted, then deny
            if ($user->trashed()) {
                return AccessResponse::deny();
            }
            //if the user is active, allow
            else {
                return AccessResponse::allow();
            }
        }
        //if the listing does not belong to the user, deny
        else{
            return AccessResponse::deny();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Listing $listing)
    {
        //check that listing belongs to user
        if ($user->id === $listing->user_id) {
            //if the user is deleted, then deny
            if ($user->trashed()) {
                return AccessResponse::deny();
            }
            //if the user is active, allow
            else {
                return AccessResponse::allow();
            }
        }
        //if the listing does not belong to the user, deny
        else{
            return AccessResponse::deny();
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Listing $listing)
    {
        //check that listing belongs to user
        if ($user->id === $listing->user_id) {
            //if the user is deleted, then deny
            if ($user->trashed()) {
                return AccessResponse::deny();
            }
            //if the user is active, allow
            else {
                return AccessResponse::allow();
            }
        }
        //if the listing does not belong to the user, deny
        else{
            return AccessResponse::deny();
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Listing $listing)
    {
        return $user->admin ? AccessResponse::allow() : AccessResponse::deny();
    }
}
