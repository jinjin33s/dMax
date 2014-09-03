<?php
class Photo extends Doctrine_Record {

	public function setTableDefinition()
        {
            $this->option('collate', 'utf8_unicode_ci');
            $this->option('charset', 'utf8');

            $this->hasColumn('title', 'string', 255);
            $this->hasColumn('description', 'string', 4096);
            $this->hasColumn('image', 'string', 255);
            $this->hasColumn('photodate','date');

	}

	public function setUp() {

            $this->setTableName('photo');
            $this->actAs('Timestampable');
	}

        public function getLastNews() {

            $ci_inst = &get_instance();
            $ci_inst->load->database();

            $query_str = 'SELECT title, `newsdate` FROM `news` WHERE 1 order by newsdate DESC LIMIT 0,2';

            $query = $ci_inst->db->query($query_str);

            return $query->result() ;
        }

        public function getNewsList() {

            $ci_inst = &get_instance();
            $ci_inst->load->database();

            $query_str = 'SELECT * FROM `news`';

            $query = $ci_inst->db->query($query_str);

            return $query->result() ;
        }

        public function getnewsDetailList() {

            $ci_inst = &get_instance();
            $ci_inst->load->database();

            $query_str = 'SELECT * FROM `news`';

            $query = $ci_inst->db->query($query_str);

            return $query->result() ;
        }

        public function getphotoList() {

            $ci_inst = &get_instance();
            $ci_inst->load->database();

            $query_str = 'SELECT * FROM `photo`';

            $query = $ci_inst->db->query($query_str);

            return $query->result() ;
        }

        public function getSearchList($offset,$perPage=10){

            if(empty($offset)){
                $offset = 0;
             }

             $productResult  = Doctrine_Query::create()

            ->select('*')
            ->from('photo')
            ->orderBy('id desc')
            ->limit($perPage)
            ->offset($offset)
            ->execute();

            if($productResult->count() > 0)
            {
                    return $productResult;
            }
            else
            {
                    return FALSE;
            }
         }

         public function getSearchCount(){

            $result =  Doctrine_Query::create()
            ->select('COUNT(*) as num_games')
            ->from('photo')
            ->setHydrationMode(Doctrine::HYDRATE_ARRAY)
            ->fetchOne();

            return $result['num_games'];

        }
}

?>
