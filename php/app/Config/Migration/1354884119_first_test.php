<?php
class FirstTest extends CakeMigration {

    /**
     * Migration description
     *
     * @var string
     * @access public
     */
    public $description = '';

    /**
     * Actions to be performed
     *
     * @var array $migration
     * @access public
     */
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'roles' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 11, 'key' => 'primary'),
                    'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 255),
                    'is_active' => array('type' => 'integer','length' => 1, 'null' => false, 'default' => NULL),
                    'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
                    'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                    ),
                    'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
                )
            )
        ),
        'down' => array(
            'drop_table' => array('roles')
        ),
    );

    /**
     * Before migration callback
     *
     * @param string $direction, up or down direction of migration process
     * @return boolean Should process continue
     * @access public
     */
    public function before($direction) {
        return true;
    }

    /**
     * After migration callback
     *
     * @param string $direction, up or down direction of migration process
     * @return boolean Should process continue
     * @access public
     */
    public function after($direction) {
        if ($direction == 'up') {
            $roleModel = $this->generateModel('Role');

            //add data to the settings model
            $role = array(
                array(
                    'id' => 1,
                    'name' => 'Super Admin',
                    'is_active' => 1
                ),
                array(
                    'id' => 2,
                    'name' => 'Company Admin',
                    'is_active' => 1
                ),
                array(
                    'id' => 3,
                    'name' => 'Site Admin',
                    'is_active' => 1
                )
            );

            $this->log($role);

            $roleModel->saveAll($role);
        }
        return true;
    }
}
