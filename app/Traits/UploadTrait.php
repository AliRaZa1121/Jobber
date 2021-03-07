<?php
namespace App\Traits;

use File;
use App\Traits\SlugTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{
    use SlugTrait;
    // public function upload(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    // {
        //     $name = !is_null($filename) ? $filename : str_random(25);
        
        //     $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
        
        //     return $file;
        // }
        // uploadImage (file, raw-name, folder, disk)
        public function uploadImage(UploadedFile $uploadedFile, $name, $folder = null, $disk = 'public'){
            $image = $uploadedFile;
            $name = $this->removeSpaces($name).date('Y-m-d');
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
            return $filePath;
        }
        // uploadImageUpdate(file, object, folder, disk)
        public function uploadImageUpdate(UploadedFile $uploadedFile, $object, $folder = null, $disk = 'public'){
            $image = $uploadedFile;
            $name = $this->removeSpaces($object->name).date('Y-m-d');
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // extra
            if($object->image != '' && $object->image != null){
                $objectOldImage = storage_path('app/public'.$object->image);
                if (File::exists($objectOldImage)) {
                    unlink($objectOldImage);
                }
            }
            // extra
            $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
            return $filePath;
        }
        
    }