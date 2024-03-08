<div>
    <!-- Ticket Header -->
    <img src="{{ asset('storage/' . $item->Events->image) }}" alt="Ticket Image">
    <p>{{ $item->Events->title }}</p>

    <!-- Event Details -->
    <div>
        <p><strong>Start Date:</strong> {{ $item->Events->start_date }}</p>
        <p><strong>End Date:</strong> {{ $item->Events->end_date }}</p>
        <p><strong>Location:</strong> {{ $item->Events->location }}</p>
        <p><strong>Number of People:</strong> {{ $item->Events->number_places }}</p>
        <div>hiybhdqsofCDDE{!! QrCode::size(100)->generate($item->Events->location); !!}</div>

    </div>

    <!-- Other Ticket Information -->
    <div>
        <!-- Add more ticket details as needed -->
    </div>

    <!-- Ticket Footer -->
    <p>Thank you for your reservation!</p>
</div>
