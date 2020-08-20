<?php


    class RepositorySDN
    {
        private $data = [];
        private $from_sdn = 0;
        private $until_sdn = 10;
        private $count;
        private $search = '';
        private $search_alt = '';

        public function __construct()
        {
            $this->getPost();
            $this->countSDN();
            $this->getSdnAll();
        }

        public function getData()
        {
            return $this->data;
        }

        public function getFromSdn()
        {
            return $this->from_sdn;
        }

        public function getUntilSdn()
        {
            return $this->until_sdn;
        }

        public function getCount()
        {
            return $this->count;
        }

        private function getSdnAll(){
            if (empty($this->search)){
                $sql = "
                     SELECT `sdn`.*, sc.comment FROM `sdn`
                     LEFT JOIN sdn_comments sc on sdn.ent_num = sc.ent_num          
                     ORDER BY `sdn`.`ent_num` ASC 
                     LIMIT {$this->from_sdn} , 10
                ";
            }else {
                $sql = "(
                     SELECT DISTINCT `sdn`.*, sc.comment FROM `sdn`
                     LEFT JOIN sdn_comments sc on sdn.ent_num = sc.ent_num
                     WHERE {$this->search}
                     )
                     UNION DISTINCT
                     (
                     SELECT DISTINCT  sdn.*, sc.comment FROM `sdn_alt`
                     LEFT JOIN `sdn`  on sdn_alt.ent_num = sdn.ent_num
                     LEFT JOIN sdn_comments sc on sc.ent_num = sdn.ent_num
                     WHERE ( {$this->search_alt} ) 
                     )
                     LIMIT {$this->from_sdn} , 10
                ";
            }




            $data = Db::getDB()->getAllStdClass($sql);


            if (empty($data)){
                $this->count = 0;
                return;
            }

            $ent_num = [];

            foreach ($data as $std)
                $ent_num[] = $std->ent_num;


            $add = $this->getAddAlt('sdn_add', $ent_num);
            $alt = $this->getAddAlt('sdn_alt', $ent_num);

            foreach ($data as &$std_data){
                foreach ($alt as $std_alt)
                    if ($std_data->ent_num === $std_alt->ent_num)
                        $std_data->alt[] = $std_alt;
                foreach ($add as $std_add) {
                    if ($std_data->ent_num === $std_add->ent_num) {
                        if (is_null($std_add->address) and is_null($std_add->address) and is_null($std_add->address) and is_null($std_add->address)) continue;
                        $std_data->add[] = $std_add;
                    }
                }
            }

            $this->data = $data;
        }

        private function getAddAlt($table, array $data){
            return Db::getDB()->getAllStdClass("
                SELECT * FROM `$table` WHERE `ent_num` = ".implode(" OR `ent_num` = ", $data)."
            ");
        }

        private function countSDN(){
            if (empty($this->search))
                 $this->count = Db::getDB()->queryFetchColumn("SELECT COUNT(*) FROM `sdn`");
            else {
                $this->count = Db::getDB()->queryFetchColumn("
                SELECT COUNT(*) FROM (
                     SELECT DISTINCT `sdn`.*, sc.comment FROM `sdn`
                     LEFT JOIN sdn_comments sc on sdn.ent_num = sc.ent_num
                     WHERE {$this->search}
                     UNION DISTINCT
                     SELECT DISTINCT  sdn.*, sc.comment FROM `sdn_alt`
                     LEFT JOIN `sdn`  on sdn_alt.ent_num = sdn.ent_num
                     LEFT JOIN sdn_comments sc on sc.ent_num = sdn.ent_num
                     WHERE ( {$this->search_alt} ) 
                     ) t
                ");
            }

        }


        private function getPost(){
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;
            if (!empty($_POST['search'])){
                $this->search();
            }if (!empty($_POST['until_sdn'])){
                $until_sdn = (int)filter_var(($_POST['until_sdn']), FILTER_SANITIZE_NUMBER_INT);
                $this->until_sdn = $until_sdn + 10;
                $this->from_sdn = $until_sdn;
            }elseif (!empty($_POST['from_sdn'])){
                $from_sdn = (int)filter_var(($_POST['from_sdn']), FILTER_SANITIZE_NUMBER_INT);
                $this->until_sdn = $from_sdn;
                $this->from_sdn = $from_sdn - 10;
            }
        }

        private function search(){
            $search = filter_var(trim($_POST['search']),FILTER_SANITIZE_STRING);
            $search_array = preg_split("/[\s,-]+/", $search);
            if (!is_array($search_array)) return;
            foreach ($search_array as $str) {
                $str = strtoupper(preg_replace("/[^\p{L}]/u","", $str));
                $this->search .= " LOWER(`sdn`.`sdn_name`) LIKE '%$str%' OR ";
                $this->search_alt .= " LOWER(`sdn_alt`.`alt_name`) LIKE '%$str%' OR ";
            }
            $this->search = substr($this->search, 0 , -3);
            $this->search_alt = substr($this->search_alt, 0 , -3);

        }


    }