<?php

namespace App\Contract;

Interface CallLogRepositoryInterface {
    public function create($data);
    public function update($updated_fileds,$id);
    public function list($page,$per_page,$search,$orderColumnIndex,$orderDirection,$draw);
}
?>