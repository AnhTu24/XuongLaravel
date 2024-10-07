@extends('client.layouts.master')

@section('content')
    
  <main class="main">

    <section class="breadcrumb">
      <ul class="breadcrumb__list flex container">
        <li><a href="index.html" class="breadcrumb__link">Home</a></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Shop</span></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link">Cart</span></li>
      </ul>
    </section>


    <section class="cart section--lg container">
      <div class="table__container">
        <table class="table">
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Remove</th>
          </tr>

          <tr>
            <td>
              <img src="client/assets/img/product-1-2.jpg" alt="" class="table__img">
            </td>

            <td>
              <h3 class="table__title">J.Crew Mercantile Men's Short-Sleeve</h3>
              <p class="table__description">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, similique.
              </p>
            </td>

            <td><span class="table__price">$100</span></td>

            <td><input type="number" value="3" class="quantity"></td>

            <td>
              <span>
                <div class="table__subtotal">$220</div>
              </span>
            </td>

            <td><i class="fa-solid fa-trash-can"></i></td>
          </tr>

          <tr>
            <td>
              <img src="client/assets/img/product-7-1.jpg" alt="" class="table__img">
            </td>

            <td>
              <h3 class="table__title">J.Crew Mercantile Men's Short-Sleeve</h3>
              <p class="table__description">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, similique.
              </p>
            </td>

            <td><span class="table__price">$100</span></td>

            <td><input type="number" value="3" class="quantity"></td>

            <td>
              <span>
                <div class="table__subtotal">$220</div>
              </span>
            </td>

            <td><i class="fa-solid fa-trash-can"></i></td>
          </tr>

          <tr>
            <td>
              <img src="client/assets/img/product-2-1.jpg" alt="" class="table__img">
            </td>

            <td>
              <h3 class="table__title">J.Crew Mercantile Men's Short-Sleeve</h3>
              <p class="table__description">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, similique.
              </p>
            </td>

            <td><span class="table__price">$100</span></td>

            <td><input type="number" value="3" class="quantity"></td>

            <td>
              <span>
                <div class="table__subtotal">$220</div>
              </span>
            </td>

            <td><i class="fa-solid fa-trash-can"></i></td>
          </tr>
        </table>
      </div>

      <div class="cart__actions">
        <a href="" class="btn flex btn--md">
          <i class="fa-solid fa-shuffle"></i> Update
        </a>

        <a href="" class="btn flex btn--md">
          <i class="fa-solid fa-bag-shopping"></i> Continue Shopping
        </a>
      </div>

      <div class="divider">
        <i class="fa-solid fa-fingerprint"></i>
      </div>

      <div class="cart__group grid">
        <div>
          <div class="cart__shipping">
            <h3 class="section__title">Calculate Shipping</h3>

            <form action="" class="form grid">
              <input type="text" class="form__input" placeholder="Sate / Conntry">

              <div class="form__group grid">
                <input type="text" class="form__input" placeholder="City">
                <input type="text" class="form__input" placeholder="PostCode / Zip">
              </div>

              <div class="form__btn">
                <button class="btn flex btn--sm">
                  <i class="fa-solid fa-shuffle"></i>
                </button>
              </div>

            </form>
          </div>

          <div class="cart__coupon">
            <h3 class="section__title">Apply Coupon</h3>

            <form action="" class="coupon__form form grid">
              <div class="form__group grid">
                <input type="text" class="form__input" placeholder="Enter Your Coupon">
                <div class="form__btn">
                  <button class="btn flex btn--sm">
                    <i class="fa-solid fa-tag"></i> Apply
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="cart__total">
          <h3 class="section__title">Cart Totals</h3>

          <table class="cart__total-table">
            <tr>
              <td><span class="card__total-title">Cart Subtotal</span></td>
              <td><span class="card__total-price">$240.00</span></td>
            </tr>

            <tr>
              <td><span class="card__total-title">Shhipping</span></td>
              <td><span class="card__total-price">$10.00</span></td>
            </tr>

            <tr>
              <td><span class="card__total-title">Total</span></td>
              <td><span class="card__total-price">$250.00</span></td>
            </tr>
          </table>

          <a href="{{ route('check-out')}}" class="btn flex btn--md">
            <i class="fa-solid fa-box"></i> Checkout
          </a>
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