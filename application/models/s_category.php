<?php
class S_category extends Doctrine_Record {

	public function setTableDefinition()
        {
                $this->option('collate', 'utf8_unicode_ci');
                $this->option('charset', 'utf8');

		$this->hasColumn('name', 'string', 48);
		$this->hasColumn('description', 'string', 2048);
                $this->hasColumn('image', 'string', 300);
                $this->hasColumn('category_id', 'integer', 4, array('unsigned' => true));
	}

	public function setUp() {

		$this->setTableName('s_category');
		$this->actAs('Timestampable');

                $this->hasOne('category', array(
			'local' => 'category_id',
			'foreign' => 'id'
		));


                $this->hasMany('product as products', array(
                    'local' => 'id',
                    'foreign' => 'sub_category_id'
                    ));
        }

        public function categoryList(){

            $s_category_list  = Doctrine_Query::create()
            ->select('*')
            ->from('s_category')
            ->orderBy('id asc')
            ->execute();
            if($s_category_list->count() > 0)
            {
                    return $s_category_list;
            }
            else
            {
                    return FALSE;
            }

        }

}

?>