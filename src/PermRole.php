<?php
namespace Trista\Perm;

use Trista\Perm\Contracts\RoleInterface;
use Trista\Perm\Traits\RoleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class PermRole extends Model implements RoleInterface
{
    use RoleTrait;

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
        $this->table = Config::get('perm.roles_table');
    }

}
