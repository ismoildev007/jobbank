<!-- Footer Start -->
<?php
    $categories= \App\Models\Category::latest()->take(4)->get();
    $lang = \Illuminate\Support\Facades\App::getLocale();
    ?>
<footer class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="contact-us">
                    <h3 class="widget-title">{{ __('messages.contact_us') }}</h3>
                    <ul class="contact-list">
                        <li><i class="icon-home"></i> <span>888 6th 10001 Oakwood Avenue, New York City, NY</span></li>
                        <li><i class="icon-call-out"></i> <span>212-631-5135 <br> 212-631-5105</span></li>
                        <li><i class="icon-envelope"></i> <span>sales@emart.com  support@emart.com</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <h3 class="widget-title">{{ __('messages.useful_links') }}</h3>
                <ul>
                    <li><a href="#">{{ __('messages.my_account') }}</a></li>
                    <li><a href="{{route('contact')}}">{{ __('messages.contact') }}</a></li>
                    <li><a href="{{route('checkout')}}">{{ __('messages.checkout') }}</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6">
                <h3 class="widget-title">{{ __('messages.categories') }}</h3>
                <ul>
                    @foreach($categories as $category)
                        <li><a href="#">{{ $category['name_'.$lang] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="block-subscribe">
                    <h3 class="widget-title">{{ __('messages.newsletter') }}</h3>
                    <p>{{ __('messages.subscribe_text') }}</p>
                    <form id="footerSubscribeForm" class="subscribe" data-toggle="validator">
                        <input
                            type="text"
                            class="form-control"
                            id="footerEmail"
                            name="email"
                            placeholder="{{ __('messages.enter_email') }}"
                            required
                        >
                        <button type="submit" class="btn btn-common" id="submit">{{ __('messages.subscribe') }}</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer End -->

<!-- Copyright Start -->
<div id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <p>Hamma huquqlar himoyalangan &copy; 2024</p>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
{{--                <div class="payment pull-right">--}}
{{--                    <img src="/assets/img/payment.png" alt="">--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->
<script>
    const apiKey = "7623464099:AAH8NeOeWyTsTylj4U0CHvdsCOmmYhmJBPo"; // Bot tokeningiz
    const chatId = "-4660323475"; // Chat ID
    const footerForm = document.getElementById("footerSubscribeForm"); // Footer form ID

    footerForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const email = document.getElementById("footerEmail").value;

        // Telegramga yuboriladigan xabarni tayyorlash
        const telegramMessage = `
<strong>Yangi Obuna</strong>
<b>Email:</b> ${email}
        `;

        try {
            // Telegramga yuborish
            const response = await fetch(`https://api.telegram.org/bot${apiKey}/sendMessage`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    chat_id: chatId,
                    text: telegramMessage,
                    parse_mode: "HTML",
                }),
            });

            if (response.ok) {
                alert("Ma'lumot muvaffaqiyatli yuborildi!");
                footerForm.reset();
            } else {
                alert("Xatolik yuz berdi. Iltimos, qayta urinib ko'ring.");
            }
        } catch (error) {
            console.error("Xatolik:", error);
            alert("Xabarni yuborishda xatolik yuz berdi.");
        }
    });
</script>


