<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Cart;
use App\Models\City;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Ward;
use Illuminate\Support\Str;
use Livewire\Component;

class CheckoutShow extends Component
{
    public $codOrder, $categories, $carts = NULL, $totalProductAmount = 0;

    public $fullname , $email, $phone , $address, $user_city, $user_district, $note, $user_ward, $detail, $price = 0, $payment_mode = NULL, $payment_id = NULL;

    public $couponDiscount, $totalPrice, $totalPriceDiscount;

    /**
     * Summary of rules
     * @return array
     */
    public function  rules()
    {
        return  [
            'fullname'  => ['required', 'string', 'max:121'],
            'email'     => ['required', 'email', 'max:121'],
            'phone'     => ['required', 'string', 'digits:10'],
        ];
    }


    public function codOrder()
    {
        // dd($this->detail);

        $this->payment_mode = 'Cash on Delivery';
        $this->validate();
        $address = Address::where('user_id', auth()->user()->id)->where('status', 1)->first();
        // dd($address);
        $total = 0;
        if ($this->couponDiscount == 0) {
            $total = $this->totalPriceDiscount;
        } else {
            $total = $this->totalPrice;
        }

        // dd($this->user_city);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'myshoes-' . Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $address->city,
            'district' => $address->district,
            'ward' => $address->ward,
            'detail' => $address->detail,
            'totalPrice' => $total,
            'totalPriceDiscount' => $this->couponDiscount,
            'note' => $this->note,
            'status_message' => 'pending',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);

        if ($order) {
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
                    'product_size_id' => $cartItem->product_size_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $this->price
                ]);

                if ($cartItem->product_size_id != NULL) {
                    $cartItem->productSize()->where('id', $cartItem->product_size_id)->decrement('quantity', $cartItem->quantity);
                }
            }
            if ($orderItems) {
                Cart::where('user_id', auth()->user()->id)->delete();
                session()->flash('message', 'Đặt hàng thành công!!!.');
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
        $this->address = Address::where('user_id', auth()->user()->id)->where('status', 1)->first();
        $cities = City::get();
        $districts = District::get();
        $wards = Ward::get();
        return view('livewire.checkout-show', [
            'categories' => $this->categories,
            // 'totalProductAmount' => $this->totalProductAmount,
            // 'totalProductAmount' => $this->totalProductAmount,
            // 'totalProductAmount' => $this->totalProductAmount,
            'address' => $this->address,
            'cities' => $cities,
            'districts' => $districts,
            'wards' => $wards,
            'couponDiscount' => $this->couponDiscount,
            'totalPrice' => $this->totalPrice,
            'totalPriceDiscount' => $this->totalPriceDiscount

        ]);
    }
}
