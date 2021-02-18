<?php

namespace App\Database\Repositories\Auth;

use App\Abstracts\Database\Repository;
use App\Database\Models\Auth\Role;
use Illuminate\Support\Facades\Hash;

class RoleRepository extends Repository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function all()
    {
        return Role::all();
    }

    /**
     * @param  array  $data
     * @param  array  $meta
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function index(array $data, array $meta)
    {
        $meta = $this->objectify($meta);

        return Role::where($data)
            ->orderBy($meta->sort, $meta->order)
            ->paginate($meta->count);
    }

    /**
     * @param  int  $id
     * @return \App\Database\Models\Auth\Role
     */
    public function grab(int $id)
    {
        return Role::findOrFail($id);
    }

    /**
     * @param  array  $data
     * @return \App\Database\Models\Auth\Role
     */
    public static function create(array $data)
    {
        $data = $this->objectify($data);

        $role = new Role;
        $role->code = $data->code;
        $role->name = $data->name;
        $role->active = $data->active;
        $role->note = $data->note;
        $role->save();

        return $role;
    }

    /**
     * @param  int  $id
     * @param  array  $data
     * @return \App\Database\Models\Auth\Role
     */
    public static function update(int $id, array $data)
    {
        $data = $this->objectify($data);

        $role = self::grab($id);
        $role->code = $data->code;
        $role->name = $data->name;
        $role->active = $data->active;
        $role->note = $data->note;
        $role->save();

        return $role;
    }

    /**
     * @param  int  $id
     * @param  bool  $active
     * @return \App\Database\Models\Auth\Role
     */
    public static function activate(int $id, bool $active)
    {
        $data = $this->objectify($data);

        $role = self::grab($id);
        $role->active = $active;
        $role->save();

        return $role;
    }

    /**
     * @param  int  $id
     * @return \App\Database\Models\Auth\Role
     */
    public static function destroy(int $id)
    {
        $data = $this->objectify($data);

        $role = self::grab($id);
        $role->delete();

        return $role;
    }
}
