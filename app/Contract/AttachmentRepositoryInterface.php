<?php
namespace App\Contract;

interface AttachmentRepositoryInterface
{
    public function getAllFilesDetails($id);
    public function uploadAttachment(array $data,$id);
    public function deleteFile($id);
    public function editFileName($id,$fileName);
    public function downloadFile($id);
}
