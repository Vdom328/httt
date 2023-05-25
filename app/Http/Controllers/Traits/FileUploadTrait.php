<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

trait FileUploadTrait
{

    /**
     * File upload trait used in controllers to upload files
     */
    public function saveFiles(Request $request)
    {
        // Lấy đường dẫn lưu trữ và tạo folder nếu không tồn tại
        $uploadPath = public_path(env('UPLOAD_PATH'));
        $thumbPath = public_path(env('UPLOAD_PATH').'/thumb');
        if (! file_exists($uploadPath)) {
            mkdir($uploadPath, 0775);
            mkdir($thumbPath, 0775);
        }
    
        // Duyệt qua từng request và kiểm tra xem có file nào được gửi lên hay không
        $finalRequest = $request;
        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                // Remove existing file (if any)
                $existing_file = $uploadPath . '/' . $request->{$key};
                if (file_exists($existing_file)) {
                    unlink($existing_file);
                }
                // Kiểm tra xem file có cần resize hay không?
                if ($request->has($key . '_max_width') && $request->has($key . '_max_height')) {
                    // Resize file với các thông số yêu cầu
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $file     = public_path(env('UPLOAD_PATH')) . '/' . $filename;
                    $request->file($key)->move(public_path(env('UPLOAD_PATH')), $filename);
                    $image    = Image::make($file);
    
                    // Tạo folder thumb nếu chưa tồn tại và lưu ảnh thu nhỏ vào đó
                    if (! file_exists($thumbPath)) {
                        mkdir($thumbPath, 0775, true);
                    }
                    Image::make($file)->resize(50, 50)->save($thumbPath . '/' . $filename);
    
                    // Resize file
                    $width  = $image->width();
                    $height = $image->height();
                    if ($width > $request->{$key . '_max_width'} && $height > $request->{$key . '_max_height'}) {
                        $image->resize($request->{$key . '_max_width'}, $request->{$key . '_max_height'});
                    } elseif ($width > $request->{$key . '_max_width'}) {
                        $image->resize($request->{$key . '_max_width'}, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    } elseif ($height > $request->{$key . '_max_width'}) {
                        $image->resize(null, $request->{$key . '_max_height'}, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }
    
                    // Lưu file đã resize vào thư mục UPLOAD_PATH
                    $image->save($uploadPath . '/' . $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                } else { // Nếu không, chỉ lưu file dưới tên mới và đưa vào $finalRequest để trả về
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $request->file($key)->move($uploadPath, $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                }
            }
        }
    
        return $finalRequest;
    }
    
}