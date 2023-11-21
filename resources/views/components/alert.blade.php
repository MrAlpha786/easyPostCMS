<!-- resources/views/components/alert.blade.php -->

@props(['alert' => null, 'dismissable' => false])

@php
    $alertClasses = [
        'info' => 'bg-blue-200 text-blue-700',
        'success' => 'bg-green-200 text-green-700',
        'warning' => 'bg-yellow-200 text-yellow-700',
        'error' => 'bg-red-200 text-red-700',
    ];
@endphp

<div {{ $attributes->merge(['class' => $alertClasses[$alert['type']] . ' mb-4 px-4 py-3 rounded-md flex justify-between shadow-md']) }}
    role="alert" id="dismissableAlert">

    <div>
        <strong class="font-bold">{{ $alert['title'] }}</strong>
        <span class="block sm:inline">{{ $alert['message'] }}</span>
    </div>

    @if ($dismissable)
        <i class="fas fa-close" onclick="dismissAlert()"></i>
    @endif
</div>

<script>
    setTimeout(function() {
        dismissAlert();
    }, 10000);

    function dismissAlert() {
        const alertElement = document.getElementById('dismissableAlert');
        if (alertElement) {
            alertElement.style.display = 'none';
        }
    }
</script>
