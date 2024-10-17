@extends('client.layouts.master')

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4"><strong>Thanh toán</strong></h2>

            @if (session('cart') && count(session('cart')) > 0)
                <form action="{{ route('processCheckout') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Thông tin người mua hàng -->
                        <div class="col-lg-6">
                            <h4><strong>Thông tin người mua hàng</strong></h4>
                            <div class="mb-3">
                                <label for="name" class="form-label"><strong>Họ và tên:</strong></label>
                                <input type="text" class="form-control" id="name" name="full_name" value="{{ Auth::user()->fullname ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"><strong>Email:</strong></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label"><strong>Số điện thoại:</strong></label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label"><strong>Địa chỉ giao hàng:</strong></label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address ?? '' }}">
                            </div>
                        </div>

                        <!-- Xem lại giỏ hàng -->
                        <div class="col-lg-6">
                            <h4><strong>Đơn hàng của bạn</strong></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><strong>Sản phẩm</strong></th>
                                        <th><strong>Số lượng</strong></th>
                                        <th><strong>Tổng tiền</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('cart') as $id => $details)
                                        <tr>
                                            <td>{{ $details['product_name'] }}</td>
                                            <td>{{ $details['quantity'] }}</td>
                                            <td>{{ number_format($details['price'] * $details['quantity']) }} đ</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2" class="text-right"><strong>Tổng cộng:</strong></td>
                                        <td><strong>{{ number_format($total) }} đ</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg">Hoàn tất thanh toán</button>
                        <a href="{{ '/shop' }}" class="btn btn-info btn-lg">Quay lại</a>
                    </div>
                </form>
            @else
                <p class="text-center"><strong>Giỏ hàng của bạn đang trống.</strong></p>
            @endif
        </div>
    </section>
@endsection
