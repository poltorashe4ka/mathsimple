<form class="yoomoney-payment-form" action="/pay_query" method="post" accept-charset="utf-8"  style="padding-left: 0px;">
    <input type="hidden" name="pay" value="49">
    <input type="hidden" name="pay_book" value="1">
    <input type="hidden" name="mera" value="{{$mera}}">
    @csrf
    <div class="ym-payment-btn-block" style="margin-top: 0px;">
        <div class="ym-input-icon-rub ym-display-none">
            <input name="sum" placeholder="0.00" class="ym-input ym-sum-input ym-required-input"
                   type="number" step="any" value="49">
        </div>
        <button type="submit" style="line-height: 20px; margin-right: 10px;"
                class="tarifs_oplata  genric-btn success"><span class="ym-text-crop">Оплатить</span>
            <span class="ym-price-output"> 49,00&nbsp;₽</span></button>
    </div>
    <input name="shopId" type="hidden" value="836972"></form>
</form>
