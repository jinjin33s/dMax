<?php
class Banner extends Doctrine_Record {

	public function setTableDefinition()
        {
                $this->option('collate', 'utf8_unicode_ci');
                $this->option('charset', 'utf8');

		$this->hasColumn('npTitle','string', 512);
                $this->hasColumn('npImg','string', 512);
                $this->hasColumn('npLink','string', 512);
                $this->hasColumn('fpTitle','string', 512);
                $this->hasColumn('fpImg','string', 512);
                $this->hasColumn('fpLink','string', 512);
	}

	public function setUp() {

		$this->setTableName('banner');
		$this->actAs('Timestampable');
	}

        public function getLastBanner() {

        $ci_inst = &get_instance();
        $ci_inst->load->database();

        $query_str = 'SELECT npTitle, fpTitle, npImg, npLink, fpImg, fpLink FROM banner' ;

        $query = $ci_inst->db->query($query_str);

        return $query->result() ;
        }

}

?>
