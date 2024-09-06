<?php

namespace App\Contract;

Interface LeadRepositoryInterface
{
    public function create($data);
    public function update($updated_fields,$id);
    public function massUpdate();
    public function delete($id);
    public function changeStatus();
    public function list($per_page,$page);
}

?>