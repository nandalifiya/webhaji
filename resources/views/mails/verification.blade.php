@component('mail::message')

Hi <b>{{$name}}</b>,

Anda telah melakukan pemesanan paket haji/umroh,

lakukan pembayaran pada rekening 

BNI: 1209 0192 1829 
BRI: 1293 8129 8123

Lakukan verifikasi dengan menekan tombol dibawah ini<br />

@component('mail::button', ['url' => $link])

Verifikasi sudah bayar<br/>

@endcomponent

Regards,<br />
WebHajiIndonesia.

@endcomponent