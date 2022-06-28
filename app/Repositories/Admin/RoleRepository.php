<?php

namespace App\Repositories\Admin;
use App\Repositories\BaseRepository;
use App\Models\Role;
use DB;
use Auth;

//use Your Model

/**
 * Class RoleRepository.
 */
class RoleRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function getRoleAdmin()
    {
        $data = Role::all();

        return $data;
    }
    

}
