<div class="p-6">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Legacy Garden Inquiries</h1>
    </div>

    <div class="overflow-x-auto rounded-lg bg-white shadow dark:bg-gray-800">
        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Event Details</th>
                    <th scope="col" class="px-6 py-3">Message</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inquiries as $inquiry)
                    <tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $inquiry->id }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $inquiry->first_name }} {{ $inquiry->last_name }}
                        </td>
                        <td class="px-6 py-4">{{ $inquiry->email }}</td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-900 dark:text-gray-100">{{ $inquiry->event_type }}</div>
                            <div>Date: {{ $inquiry->event_date }}</div>
                            <div class="text-xs text-gray-500">Guests: {{ $inquiry->guest_count }}</div>
                        </td>
                        <td class="px-6 py-4 truncate max-w-xs" title="{{ $inquiry->message }}">
                            {{ Str::limit($inquiry->message, 50) }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="rounded px-2.5 py-0.5 text-xs font-medium {{ $inquiry->status === 'responded' ? 'bg-green-100 text-green-800' : ($inquiry->status === 'closed' ? 'bg-gray-100 text-gray-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($inquiry->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $inquiry->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $inquiries->links() }}
    </div>
</div>
