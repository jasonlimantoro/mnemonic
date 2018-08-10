<?php

namespace Tests\Integration;

use App\Image;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadsImageTest extends TestCase
{
    public function testImageUpload()
    {
        Storage::fake('uploads');
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->ajaxPost( '/uploadAjax', [
            'image' => $file
        ]);

        $response->assertExactJson(['message' => 'Upload success']);

        // Assert the file was stored...
        Storage::disk('uploads')->assertExists('avatar.jpg');
    }
}
