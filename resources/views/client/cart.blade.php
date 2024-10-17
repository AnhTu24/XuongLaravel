@extends('client.layouts.master')

@section('content')
    <!-- Cart Section -->
    <main>
    @if (session('cart') && count(session('cart')) > 0)
    <section class="cart section--lg container">
        <div class="table__container">
            <table class="table">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Xóa</th>
                </tr>

                @php $total = 0; @endphp
                @foreach (session('cart') as $id => $details)
                {{-- {{dd($details)}} --}}
                    @php 
                        $imagePath = asset('/storage/' . $details['image']);
                        $subTotal = $details['price'] * $details['quantity'];
                        $total += $subTotal;
                    @endphp

                    <tr>
                        <td><img src="{{ $imagePath }}" alt="" class="table__img ma"></td>
                        <td>
                            <h3 class="table__title">{{ $details['product_name'] }}</h3>
                            {{-- <span class="table_color">Màu sắc: {{ $details['color'] }}</span><br>
                            <span class="table_size">Kích cỡ: {{ $details['size'] }}</span> --}}
                        </td>
                        <td><span class="table__price">${{ number_format($details['price'], 0, ',', '.') }}</span></td>
                        <td>
                            <form action="{{ route('updateCart', $id) }}" method="POST" class="d-inline-block">
                                @csrf
                                <div class="input-group">
                                    <button type="submit"  name="quantity"
                                        value="{{ $details['quantity'] - 1 }}"
                                        {{ $details['quantity'] <= 1 ? 'disabled' : '' }}>-</button>
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="quantity" readonly>
                                    <button type="submit" name="quantity"
                                        value="{{ $details['quantity'] + 1 }}">+</button>
                                </div>
                            </form>
                        </td>
                        <td><span class="table__subtotal">${{ number_format($subTotal, 0, ',', '.') }}</span></td>
                        <td>
                            <form action="{{ route('removeFromCart', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="totalProductPrice">
                <h3 class="totalPrice">Tổng thành tiền</h3>
                <span class="priceOrders">${{ number_format($total, 0, ',', '.') }}</span>
            </div>
        </div>

        <div class="cart__actions">
            <a href="{{ url('/') }}" class="btn flex btn--md">
                <i class="fa-solid fa-bag-shopping"></i> Tiếp tục mua hàng
            </a>
            <a href="{{ route('checkout') }}" class="btn flex btn--md">
                <i class="fa-solid fa-box"></i> Đặt hàng
            </a>
        </div>
    </section>

    @else
    <section class="cart section--lg container emptyCart">
        <h3>Bạn chưa chọn sản phẩm nào</h3>
        <div class="imgEmpty">
            <img src="{{ asset('client/assets/img/emptycart.png') }}" alt="emptyImage">
        </div>
        <span>Hãy nhanh tay chọn ngay những sản phẩm yêu thích.</span>
        <a class="back" href="{{ url('/shop') }}">Tiếp tục mua hàng</a>
    </section>
    @endif

</main>
@endsection
