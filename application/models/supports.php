<?php
class Supports extends Doctrine_Record {

	public function setTableDefinition()
        {

            $this->option('collate', 'utf8_unicode_ci');
            $this->option('charset', 'utf8');

            $this->hasColumn('name', 'string', 512);
            $this->hasColumn('description', 'string', 512);
            $this->hasColumn('image1', 'string', 2048);
            $this->hasColumn('image2', 'string', 2048);
            $this->hasColumn('file1', 'string', 2048);
            $this->hasColumn('file2', 'string', 512);
            $this->hasColumn('file3', 'string', 512);
            $this->hasColumn('file4', 'string', 512);

	}

	public function setUp() {

            $this->setTableName('support');
            $this->actAs('Timestampable');
	}
        
        public function getTechList($offset,$perPage=10){
       
            if(empty($offset)){
                $offset = 0;
             }
             $productResult  = Doctrine_Query::create()
             
            ->select('*')
            ->from('supports')
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

        public function getCount(){
            $result =  Doctrine_Query::create()
            ->select('COUNT(*) as num_games')
            ->from('supports')
            ->setHydrationMode(Doctrine::HYDRATE_ARRAY)
            ->fetchOne();
            return $result['num_games'];
        }
}

?>