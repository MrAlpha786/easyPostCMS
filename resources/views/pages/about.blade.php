<!-- Extending the 'layouts.home' template -->
@extends('layouts.home')

<!-- Setting the title for the 'About Us' page -->
@section('title', 'About Us')


@section('content')
    <section class="mb-8">
        <h2 class="text-3xl font-semibold mb-4">About Us</h2>
        <p>Welcome to our premier e-postal service, meticulously designed to revolutionize the way you send and receive
            mail. We bring the future of postal services to your fingertips.</p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl font-semibold mb-4">Our Mission</h2>
        <p>We are dedicated to offering a comprehensive system that simplifies and enhances various aspects of courier
            services and post office operations.</p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl font-semibold mb-4">Our Services</h2>
        <ul class="list-disc list-inside">
            <li><strong>Customer Registration:</strong> Seamless and hassle-free registration for our valued customers.</li>
            <li><strong>Courier Booking:</strong> Effortlessly book courier services tailored to your needs.</li>
            <li><strong>Payment of Booking Amount:</strong> Secure payment options to complete your bookings.</li>
            <li><strong>Shipment Tracking:</strong> Real-time tracking to keep you informed about the status of your
                shipments.</li>
            <li><strong>Feedback Submission:</strong> We encourage your feedback to continually improve our services.</li>
            <li><strong>View the Courier Rate Lists:</strong> Access transparent and up-to-date rate lists for your
                convenience.</li>
        </ul>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl font-semibold mb-4">Experience Excellence</h2>
        <p>Our e-Post/courier service Office represents the epitome of convenience in the world of postal services. As an
            online portal, we bring the world-renowned postal service directly to your fingertips.</p>
    </section>

    <section class="mb-8">
        <h3 class="text-2xl font-semibold mb-4">Our Offerings Include:</h3>
        <ul class="list-disc list-inside">
            <li><strong>Order Delivery:</strong> Swift and reliable delivery services to meet your needs.</li>
            <li><strong>Tracking:</strong> Keep a watchful eye on your packages with our state-of-the-art tracking system.
            </li>
            <li><strong>Packaging:</strong> Trust us with secure and professional packaging, ensuring the safety of your
                items.</li>
        </ul>
    </section>

    <p>At our core, we aim to replicate the efficiency and reliability of dedicated courier services. Your satisfaction and
        convenience are our top priorities.</p>
@endsection
