<?php
namespace App\Repositories;

use App\Contract\AttachmentRepositoryInterface;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


class AttachmentRepository implements AttachmentRepositoryInterface
{
    protected $model;

    public function __construct(Attachment $attachment)
    {
        $this->model = $attachment;
    }

    public function deleteFile($id)
    {
        $attachment = $this->model->find($id);

        if ($attachment) {
            // Delete the file from Wasabi storage
            $filePath = $attachment->file_path;
            Storage::disk('wasabi')->delete($filePath);

            // Delete the file record from the database
            $attachment->delete();

            return true;
        }

        return false;
    }

    public function editFileName($id,$fileName)
    {
        $attachment = $this->model->find($id);
    
        if ($attachment) {
            $attachment->file_name = $fileName;
            $attachment->save();
            return $attachment;
        }
        return null;
    }

    public function downloadFile($id)
    {
        $attachment = $this->model->find($id);
        if ($attachment) {
            $filePath = $attachment->file_path;

            if (Storage::disk('wasabi')->exists($filePath)) {

                $wasaby_url = env('WASABI_ENDPOINT');
                $bucketName = env('WASABI_BUCKET');
                $file_path = $wasaby_url.'/'.$bucketName.'/'.$filePath;

                return ['download_url' => $file_path];
            }
        }
        return null;
    }


    public function getAllFilesDetails($id)
    {
        $attachment = $this->model
            ->select(['users.name','attachments.id', 'attachments.created_at', 'attachments.file_name', 'attachments.file_size'])
            ->leftJoin('users', 'attachments.user_id', '=', 'users.id')
            ->where('attachments.lead_id', $id)
            ->get();

        return $attachment;
    }

    public function uploadAttachment($files,$lead_id)
    {
        $uploadedFiles = [];

        foreach ($files as $file) {
            if ($file instanceof UploadedFile && $file->isValid()) {
                try {
                    $fileExtension = $file->getClientOriginalExtension();
                    $fileSlugName = $file->getfilename();
                    $file_folder = env('STORAGE_PATH');
                    $filename = 'lead_'.time().$fileSlugName.'.'.$fileExtension;
                    $file_path = $file_folder.$filename;
                    $isUploaded = Storage::disk('wasabi')->put($file_path, file_get_contents($file),'public');
                    if($isUploaded) {
                        $uploadedFile = $this->model->create([
                            'file_name' => $file->getClientOriginalName(),
                            'file_size' => round($file->getSize() / 1024, 2),
                            'file_path' => $file_path,
                            'lead_id' => $lead_id,
                            'user_id' => auth()->user()->id,
                        ]);
                        $uploadedFiles[] = $uploadedFile;
                    }

                } catch (\Exception $e) {
                    // Log error
                    continue;
                }
            }
        }
        return $uploadedFiles;
    }
}
