<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Livewire\Component;

class CheckoutShow extends Component
{
    public $codOrder , $categories, $carts = NULL, $totalProductAmount = 0;

    public $fullname = NULL, $email = NULL, $phone = NULL, $pincode = NuLL, $address = NULL, $price = 0, $payment_mode = NULL, $payment_id = NULL;

    // protected $listeners = [
    //     'validationForAll'
    // ];

    // public function validationForAll()
    // {
    //     $this->validate();
        
    // }

    /**
     * Summary of rules
     * @return array
     */
    public function  rules()
    {
        return  [
            'fullname'  => ['required', 'string', 'max:121'],
            'email'     => ['required', 'email', 'max:121'],
            'phone'     => ['required', 'integer', 'digits:10'],
            'pincode'   => ['required', 'integer', 'digits:6'],
            'address'   => ['required', 'string', 'max:500'],
        ];
    }

    public function codOrder()
    {

        $this->payment_mode = 'Cash on Delivery';
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'myshoes-'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);

        $this->carts = Cart::where('user_id', auth()->user()->id)->get();

        foreach ($this->carts as $cartItem) {

            if ($cartItem->product->selling_price != 0) {
                $this->price = $cartItem->product->selling_price;
            } else {
                $this->price = $cartItem->product->original_price;
            }

            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $this->price
            ]);

            if($cartItem->product_color_id != NULL){
                $cartItem->productColor()->where('id',$cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
            }else{
                $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity', $cartItem->quantity);

            }
        }
        if ($orderItems) {
            Cart::where('user_id', auth()->user()->id)->delete();
            session()->flash('message','Đặt hàng thành công!!!.');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đặt hàng thành công!!!.',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect('/user/thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã có lỗi xảy ra.',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cart) {
            if ($cart->product->selling_price != 0) {

                if ($cart->product->selling_price > $cart->product->original_price) {
                    $this->totalProductAmount += $cart->product->selling_price * $cart->quantity;
                } else {
                    $this->totalProductAmount += $cart->product->original_price * $cart->quantity;
                }
            } else {
                $this->totalProductAmount += $cart->product->original_price * $cart->quantity;
            }
        }

        return $this->totalProductAmount;
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.checkout-show', [
            'categories' => $this->categories,
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }
}
