@component('mail::message')

Hi <b>{{$name}}</b>,

Anda telah melakukan pemesanan paket haji/umroh,<br />

lakukan pembayaran pada rekening <br />

BNI: 1209 0192 1829 <br />
BRI: 1293 8129 8123<br />

Lakukan verifikasi dengan menekan tombol dibawah ini<br />

@component('mail::button', ['url' => $link])

Verifikasi sudah bayar<br/>

@endcomponent

Regards,<br />
WebHajiIndonesia.

@endcomponent