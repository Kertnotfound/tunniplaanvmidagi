<x-mail::message>
# Nädala tunniplaan

{{ $startDate->format('d.m.Y') }}–{{ $endDate->format('d.m.Y') }}

@foreach ($timetableEvents as $day => $events)
## {{ ucfirst($day) }}

@foreach ($events as $event)
- **{{ $event['timeStart'] }}–{{ $event['timeEnd'] }}** {{ $event['nameEt'] }}
@endforeach

@endforeach
</x-mail::message>
