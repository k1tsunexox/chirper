namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChirpRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Auth is handled by route middleware
    }

    public function rules(): array
    {
        return [
            'message' => 'required|string|min:5|max:255',
        ];
    }
}