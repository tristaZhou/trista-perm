<?php
namespace Trista\Perm;

use Trista\Perm\Contracts\PermissionInterface;
use Trista\Perm\Traits\PermissionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class PermPermission extends Model implements PermissionInterface
{
    use PermissionTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('perm.permissions_table');
    }
}
