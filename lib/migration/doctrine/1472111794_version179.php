<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version179 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('petition_signing', 'bounce_at', 'timestamp', '25', array(
             'notnull' => '',
             ));
        $this->addColumn('petition_signing', 'bounce_blocked', 'integer', '1', array(
             'notnull' => '1',
             'default' => '0',
             ));
        $this->addColumn('petition_signing', 'bounce_hard', 'integer', '1', array(
             'notnull' => '1',
             'default' => '0',
             ));
        $this->addColumn('petition_signing', 'bounce_related_to', 'string', '20', array(
             'notnull' => '',
             ));
        $this->addColumn('petition_signing', 'bounce_error', 'string', '20', array(
             'notnull' => '',
             ));
    }

    public function down()
    {
        $this->removeColumn('petition_signing', 'bounce_at');
        $this->removeColumn('petition_signing', 'bounce_blocked');
        $this->removeColumn('petition_signing', 'bounce_hard');
        $this->removeColumn('petition_signing', 'bounce_related_to');
        $this->removeColumn('petition_signing', 'bounce_error');
    }
}