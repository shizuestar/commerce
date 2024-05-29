{{-- class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['transaction_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailTransactions()
    {
        return $this->hasMany(DetailTransaction::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); // tambahkan relasi ke Product
    }

    public static function addToCart(User $user, Product $product)
    {
        $transaction = self::create([
            'user_id' => $user->id,
            'product_id' => $product->id, // tambahkan product_id
        ]);

        $detailTransaction = DetailTransaction::create([
            'transaction_id' => $transaction->id,
            'product_id' => $product->id,
            'jumlah' => 1, // default jumlah 1
            'harga' => $product->harga, // dapatkan harga dari product
            'sub_total' => $product->harga, // dapatkan sub_total dari product
        ]);

        return $transaction;
    }
} --}}
























{{-- use App\Models\Product;
use App\Models\Transaction;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product_id = $request->input('product_id');

        $product = Product::findOrFail($product_id); // pastikan produk ada

        $transaction = Transaction::addToCart(auth()->user(), $product); // tambahkan ke cart

        // ... proses tambahan, seperti redirect ke halaman cart
    }
} --}}