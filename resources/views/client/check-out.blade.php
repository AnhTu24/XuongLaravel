@extends('client.layouts.master')

@section('content')
<main class="main">
    <section class="breadcrumb">
      <ul class="breadcrumb__list flex container">
        <li><a href="index.html" class="breadcrumb__link">Home</a></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Shop</span></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Checkout</span></li>
      </ul>
    </section>
    <section class="checkout section--lg">
      <div class="checkout__container container grid">
        <div class="checkout__group">
          <h3 class="section__title">Billing Details</h3>

          <form action="" class="form grid">
            <input type="text" class="form__input" placeholder="Name">

            <input type="text" class="form__input" placeholder="Address">

            <input type="text" class="form__input" placeholder="City">

            <input type="text" class="form__input" placeholder="Country">

            <input type="text" class="form__input" placeholder="Postcode">

            <input type="text" class="form__input" placeholder="Phone">

            <input type="text" class="form__input" placeholder="Email">

            <h3 class="checkout__title">Additional Information</h3>

            <textarea name="" id="" cols="30" rows="10" placeholder="Order note"
              class="form__input textarea"></textarea>

          </form>
        </div>

        <div class="checkout__group">
          <h3 class="section__title">Cart Totals</h3>

          <table class="order__table">
            <tr>
              <th colspan="2">Products</th>
              <th>Total</th>
            </tr>

            <tr>
              <td>
                <img src="client/assets/img/product-1-2.jpg" alt="" class="order__img">
              </td>

              <td>
                <h3 class="table__title"> Yidartion Women Summer
                </h3>
                <p class="table__quantity">x 2</p>
              </td>

              <td>
                <span class="table__price">$180.00</span>
              </td>

            </tr>

            <tr>
              <td>
                <img src="client/assets/img/product-7-1.jpg" alt="" class="order__img">
              </td>

              <td>
                <h3 class="table__title"> Yidartion Women Summer
                </h3>
                <p class="table__quantity">x 2</p>
              </td>

              <td>
                <span class="table__price">$180.00</span>
              </td>

            </tr>

            <tr>
              <td>
                <img src="client/assets/img/product-2-1.jpg" alt="" class="order__img">
              </td>

              <td>
                <h3 class="table__title"> LBD Women Summer
                </h3>
                <p class="table__quantity">x 1</p>
              </td>

              <td>
                <span class="table__price">$170.00</span>
              </td>

            </tr>

            <tr>
              <td><span class="order__subtitle">SubTotal</span></td>
              <td colspan="2"><span class="table__price">$280.00</span></td>
            </tr>

            <tr>
              <td><span class="order__subtitle">Shipping</span></td>
              <td colspan="2"><span class="table__price">Free Shipping</span></td>
            </tr>

            <tr>
              <td><span class="order__subtitle">Total</span></td>
              <td colspan="2"><span class="order__grand-total">$280.00</span></td>
            </tr>
          </table>

          <div class="payment__methods">
            <h3 class="checkout__title payment__title">Payment</h3>

            <div class="payment__option flex">
              <input type="radio" name="radio" class="payment__input">
              <label for="" class="payment__label">Direct Bank Transfer</label>
            </div>

            <div class="payment__option flex">
              <input type="radio" name="radio" class="payment__input">
              <label for="" class="payment__label">Check Payment</label>
            </div>

            <div class="payment__option flex">
              <input type="radio" name="radio" class="payment__input">
              <label for="" class="payment__label">Paypal</label>
            </div>

            <button class="btn btn--md">Place Order</button>
          </div>
        </div>
      </div>
    </section>

    <section class="newsletter section">
      <div class="newsletter__container container grid">
        <h3 class="newsletter__title flex">
          <img src="client/assets/img/icon-email.svg" alt="" class="newsletter__icon">
          Sign up to Newsletter
        </h3>

        <p class="newsletter__description">
          ..and receive $25 coupon for first shopping
        </p>

        <form action="" class="newsletter__form">
          <input type="text" class="newsletter__input" placeholder="Enter your email">
          <button type="submit" class="newletter__btn">Subscribe</button>
        </form>
      </div>

    </section>
  </main>
@endsection
