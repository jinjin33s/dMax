<?php
class Category extends Doctrine_Record {

	public function setTableDefinition()
        {
                $this->option('collate', 'utf8_unicode_ci');
                $this->option('charset', 'utf8');

		$this->hasColumn('name', 'string', 50);
		$this->hasColumn('description', 'string', 300);
                $this->hasColumn('image', 'string', 300);
                $this->hasColumn('banner', 'string', 300);
	}

	public function setUp() {

		$this->setTableName('category');
		$this->actAs('Timestampable');
                
                $this->hasMany('s_category as s_categories', array(
                    'local' => 'id',
                    'foreign' => 'category_id'
                    ));                                
        }

        public function getCategoryList(){
            $ci_inst = &get_instance();
            $ci_inst->load->database();
            $query_str = 'SELECT * FROM `category` ';
            $query = $ci_inst->db->query($query_str);
            return $query->result() ;
        }

}

?>