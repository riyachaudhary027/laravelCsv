<?php
 
namespace App\Imports;
 
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
 
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $originalImageUrl = $row['profile_image'];
        
        $imagePath = $this->handleImage($originalImageUrl);
 
        return new Profile([
            'name'             => $row['name'],
            'phone'            => $row['phone'],
            'email'            => $row['email'],
            'street'           => $row['street_address'],
            'city'             => $row['city'],
            'state'            => $row['state'],
            'country'          => $row['country'],
            'profile_image'    => $imagePath,
            'profile_image_url' => $originalImageUrl
        ]);
    }
 
    private function handleImage($imageUrl)
    {
        if (filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            $imageContent = Http::get($imageUrl)->body();
            $imageName = 'profile_images/' . uniqid() . '.jpg';
            Storage::disk('public')->put($imageName, $imageContent);
            return $imageName;
        }
        return $imageUrl;
    }
}