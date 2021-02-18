<?php

namespace App\Database\Repositories\Logs;

use App\Abstracts\Database\Repository;
use App\Database\Models\Logs\AuthenticationLog;
use App\Transformers\Resources\RelatedResources\Logs\AuthenticationLogRelatedResource;
use Illuminate\Support\Facades\Hash;

class AuthenticationLogRepository extends Repository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function all()
    {
        return AuthenticationLog::all();
    }

    /**
     * @param  array  $data
     * @param  array  $meta
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function index(array $data, array $meta)
    {
        $meta = $this->objectify($meta);

        return AuthenticationLog::where($data)
            ->orderBy($meta->sort, $meta->order)
            ->paginate($meta->count);
    }

    /**
     * @param  int  $id
     * @return \App\Database\Models\Logs\AuthenticationLog
     */
    public function grab(int $id)
    {
        return AuthenticationLog::findOrFail($id);
    }

    /**
     * @param  array  $data
     * @return \App\Database\Models\Logs\AuthenticationLog
     */
    public static function create(array $data)
    {
        $data = $this->objectify($data);

        $authenticationLog = new AuthenticationLog;
        $authenticationLog->user_id = $data->user_id;
        $authenticationLog->ip_address = $data->ip_address;
        $authenticationLog->state = $data->state;
        $authenticationLog->save();

        return $authenticationLog;
    }

    /**
     * @param  int  $id
     * @param  array  $data
     * @return \App\Database\Models\Logs\AuthenticationLog
     */
    public static function update(int $id, array $data)
    {
        $data = $this->objectify($data);

        $authenticationLog = self::grab($id);
        $authenticationLog->user_id = $data->user_id;
        $authenticationLog->ip_address = $data->ip_address;
        $authenticationLog->state = $data->state;
        $authenticationLog->save();

        return $authenticationLog;
    }

    /**
     * @param  int  $id
     * @return \App\Database\Models\Logs\AuthenticationLog
     */
    public static function destroy(int $id)
    {
        $data = $this->objectify($data);

        $authenticationLog = self::grab($id);
        $authenticationLog->delete();

        return $authenticationLog;
    }
}
