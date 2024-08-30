<?php

namespace App\Contract;

Interface LeadRepositoryInterface
{
    public function create();
    public function update();
    public function massUpdate();
    public function delete();
    public function changeStatus();
    public function list();
}

?>