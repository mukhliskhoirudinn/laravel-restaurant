<x-mail::message>
# Booking Confirmation

Dear {{ $data['name'] }},

This is an automatic confirmation of your booking on {{ date('d-m-Y', strtotime($data['date'])) }} at {{ $data['time'] }}. Below are the details of your booking:

- Restaurant: Yummy Restaurant
- Type: {{ $data['type'] }}
- Number of guests: {{ $data['people'] }}
- Total price: Rp. {{ number_format($data['amount'], 0, ',', '.') }}

Please wait for our staff to verify your booking. We will send you a verification email once your booking is confirmed.

Thank you for choosing us.

Best regards,
Yummy Restaurant
</x-mail::message>

