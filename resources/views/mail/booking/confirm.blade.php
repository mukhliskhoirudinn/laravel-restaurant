<x-mail::message>
# Your Order Has Been Confirmed, Status: {{ $data['status'] }}

Dear {{ $data['name'] }},

We are pleased to inform you that your booking on {{ date('d-m-Y', strtotime($data['date'])) }} at {{ $data['time'] }} has been confirmed. Below are the details of your booking:

- Restaurant: Yummy Restaurant
- Type: {{ $data['type'] }}
- Number of guests: {{ $data['people'] }}
- Total price: Rp. {{ number_format($data['amount'], 0, ',', '.') }}

<x-mail::button :url="asset('storage/'. $data['file'])">
Download Struk Bayar
</x-mail::button>

Thank you for choosing us.

Best regards,
Yummy Restaurant
</x-mail::message>
