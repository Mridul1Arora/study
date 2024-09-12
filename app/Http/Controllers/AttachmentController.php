<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract\AttachmentRepositoryInterface;

class AttachmentController extends Controller
{
    protected $repository;

    public function __construct(AttachmentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handleAction(Request $request)
    {
        $actionCode = $request->input('action_code');
        $fileId = $request->input('file_id');

        switch ($actionCode) {
            case 'D':  // Delete
                $result = $this->repository->deleteFile($fileId);
                if ($result) {
                    return response()->json(['message' => 'File deleted successfully']);
                }
                return response()->json(['error' => 'File not found'], 404);
            case 'E':  // Edit
                $newFileName = ($request->input('new_file_name'))??[];
                $result = $this->repository->editFileName($fileId,$newFileName);
                if ($result) {
                    return response()->json(['message' => 'File name updated successfully', 'new_file_name' => $newFileName]);
                }
                return response()->json(['error' => 'File not found or update failed'], 404);
            case 'DL': //Download
                $result = $this->repository->downloadFile($fileId);
                if ($result) {
                    return $result;
                }
                return response()->json(['error' => 'File not found'], 404);
            default:
                return response()->json(['error' => 'Invalid action'], 400);
        }
    }

    public function upload(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5000',
        ]);

        $files = $request->file('files');

        if (!empty($files)) {
            try {
                $uploadedFiles = $this->repository->uploadAttachment($files);
                return response()->json(['uploaded_files' => $uploadedFiles], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => 'File upload failed.'], 500);
            }
        }

        return response()->json(['message' => 'No files were uploaded.'], 400);
    }

    public function getFilesData()
    {
        $id = 1;
        $attachments = $this->repository->getAllFilesDetails($id);
        return $attachments;

    }

    public function index()
    {
        return view('attachment/attachment');
    }

}
