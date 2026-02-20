<div class="p-6">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Reservations</h1>
    </div>

    <div class="overflow-x-auto rounded-lg bg-white shadow dark:bg-gray-800">
        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Phone</th>
                    <th scope="col" class="px-6 py-3">Date & Time</th>
                    <th scope="col" class="px-6 py-3">Guests</th>
                    <th scope="col" class="px-6 py-3">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $reservation->id }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $reservation->name }}</td>
                        <td class="px-6 py-4">{{ $reservation->phone }}</td>
                        <td class="px-6 py-4">
                            {{ $reservation->date }}
                        </td>
                        <td class="px-6 py-4">{{ $reservation->guests }}</td>
                        <td class="px-6 py-4">{{ $reservation->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $reservations->links() }}
    </div>
</div>
