<?php
class Product extends Doctrine_Record {

	public function setTableDefinition()
        {

            $this->option('collate', 'utf8_unicode_ci');
            $this->option('charset', 'utf8');

            $this->hasColumn('name', 'string', 512);
            $this->hasColumn('title', 'string', 2048);
            $this->hasColumn('tag', 'string', 2048);
            $this->hasColumn('features', 'string', 5000);
            $this->hasColumn('specifications', 'string', 2048);
            $this->hasColumn('dimensions', 'string', 2048);
            $this->hasColumn('image', 'string', 512);
            $this->hasColumn('subimage1', 'string', 512);
            $this->hasColumn('subimage2', 'string', 512);
            $this->hasColumn('subimage3', 'string', 512);
            $this->hasColumn('subimage4', 'string', 512);
            $this->hasColumn('subimage5', 'string', 512);
            $this->hasColumn('subimage6', 'string', 512);
            $this->hasColumn('manual', 'string', 512);
            $this->hasColumn('catalog', 'string', 512);
            $this->hasColumn('cad', 'string', 512);
            $this->hasColumn('software', 'string', 512);
            $this->hasColumn('rpName1', 'string', 512);
            $this->hasColumn('rpImg1', 'string', 512);
            $this->hasColumn('rpDown11', 'string', 512);
            $this->hasColumn('rpDown12', 'string', 512);
            $this->hasColumn('rpName2', 'string', 512);
            $this->hasColumn('rpImg2', 'string', 512);
            $this->hasColumn('rpDown21', 'string', 512);
            $this->hasColumn('rpDown22', 'string', 512);
            $this->hasColumn('rpName3', 'string', 512);
            $this->hasColumn('rpImg3', 'string', 512);
            $this->hasColumn('rpDown31', 'string', 512);
            $this->hasColumn('rpDown32', 'string', 512);
            $this->hasColumn('rpName4', 'string', 512);
            $this->hasColumn('rpImg4', 'string', 512);
            $this->hasColumn('rpDown41', 'string', 512);
            $this->hasColumn('rpDown42', 'string', 512);
            $this->hasColumn('sub_category_id', 'integer', 4, array('unsigned' => true));
	}

	public function setUp() {
            $this->setTableName('product');
            $this->actAs('Timestampable');
            
            $this->hasOne('s_category as sub_category', array(
			'local' => 'sub_category_id',
			'foreign' => 'id'
		));
           
	}

        public function getList($offset,$perPage=10,$subCategory_id){

            if(empty($offset)){
                $offset = 0;
             }
             $productResult  = Doctrine_Query::create()
            ->select('*')
            ->from('product')
            ->where("sub_category_id='".$subCategory_id."'")
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

         public function getCount($subCategory_id){

            $result =  Doctrine_Query::create()
            ->select('COUNT(*) as num_products')
            ->from('product')
            ->where("sub_category_id='".$subCategory_id."'")
            ->setHydrationMode(Doctrine::HYDRATE_ARRAY)
            ->fetchOne();
            return $result['num_products'];
        }

        public function getAdminList($offset,$perPage=10){

            if(empty($offset)){
                $offset = 0;
             }
             $productResult  = Doctrine_Query::create()
            ->select('*')
            ->from('product')
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

         public function getAdminCount(){

            $result =  Doctrine_Query::create()
            ->select('COUNT(*) as num_games')
            ->from('product')
            ->setHydrationMode(Doctrine::HYDRATE_ARRAY)
            ->fetchOne();
            return $result['num_games'];
        }
        
        public function breadgetcategory($subCategory_id){
            
            $productResult  = Doctrine_Query::create()
            ->select('*')
            ->from('product')
            ->where("sub_category_id='".$subCategory_id."'")
            ->orderBy('id desc')
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
         
         public function getBoxCount(){

            $result =  Doctrine_Query::create()
            ->select('COUNT(*) as num_games')
            ->from('product')
            ->where('sub_category_id = 1')
            ->setHydrationMode(Doctrine::HYDRATE_ARRAY)
            ->fetchOne();

            return $result['num_games'];

        }

        public function getSearchList($searchStr,$offset,$perPage=10){

            if(empty($offset)){
                $offset = 0;
             }

             $productResult  = Doctrine_Query::create()

                ->select('*')
                ->from('product p')
                ->innerJoin('p.sub_category s')
                ->innerJoin('s.category c')
                ->where("p.features like '%" . $searchStr . "%' or p.name like '%" . $searchStr ."%' or s.name like '%" . $searchStr ."%' or c.name like '%" . $searchStr . "%'")
                ->orderBy('p.id desc')
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

         public function getSearchCount($searchStr){

            $result =  Doctrine_Query::create()
            ->select('COUNT(*) as product_count')
            ->from('product p')
            ->innerJoin('p.sub_category s')
            ->innerJoin('s.category c')
            ->where("p.features like '%" . $searchStr . "%' or p.name like '%" . $searchStr ."%' or s.name like '%" . $searchStr ."%' or c.name like '%" . $searchStr . "%'")
            ->setHydrationMode(Doctrine::HYDRATE_ARRAY)
            ->fetchOne();

            return $result['product_count'];

        }

        public function getSearchListAdmin($searchStr,$offset,$perPage=10){

            if(empty($offset)){
                $offset = 0;
             }

             $productResult  = Doctrine_Query::create()

                ->select('*')
                ->from('product p')
                ->innerJoin('p.sub_category s')
                ->innerJoin('s.category c')
                ->where("p.features like '%" . $searchStr . "%' or p.name like '%" . $searchStr ."%' or s.name like '%" . $searchStr ."%' or c.name like '%" . $searchStr . "%'")
                ->orderBy('p.id desc')
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

         public function getDownloadList(){
            $ci_inst = &get_instance();
            $ci_inst->load->database();
            $query_str = 'SELECT * FROM `product`';
            $query = $ci_inst->db->query($query_str);
            return $query->result() ;
        }

}

?>