@php($practice = config('practice'))

<p><strong>New contact inquiry</strong></p>
<ul>
    <li><strong>Name:</strong> {{ $messageModel->name }}</li>
    <li><strong>Email:</strong> {{ $messageModel->email }}</li>
    <li><strong>Phone:</strong> {{ $messageModel->phone ?: 'Not provided' }}</li>
    <li><strong>Submitted:</strong> {{ $messageModel->created_at->format('M j, Y g:i A') }}</li>
    <li><strong>IP:</strong> {{ $messageModel->submitted_ip }}</li>
</ul>

<p><strong>Message:</strong></p>
<p>{{ $messageModel->message }}</p>

<p>Reply directly to {{ $messageModel->email }} or call {{ $practice['phone'] }}.</p>
